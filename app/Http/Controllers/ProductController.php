<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Offer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
    // Fetch products with user (seller) details, paginated by 10 per page
    $products = Product::with(['user' => function($query) {
        $query->select('id', 'name', 'user_type'); // Fetch required fields
    }])->paginate(10);

    return view('adminfrontend.product-list', compact('products'));
}




    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::whereNotNull('category_id')->get();
        return view('adminfrontend.product-add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
{
    $data = array(
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'slug' => $request->slug,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'added_by' => $request->input('created_by'),
    );

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("uploads/"), $fileName);
        $data['image'] = $fileName;
    }

    // Create the product
    $product = Product::create($data);

    // Check if offer fields are filled
    if ($request->filled(['offer_name', 'discount_percentage', 'start_date', 'end_date'])) {
        $request->validate([
            'offer_name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|between:0,100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $discountedPrice = $product->price - ($product->price * ($request->discount_percentage / 100));

        Offer::create([
            'product_id' => $product->id,
            'offer_name' => $request->offer_name,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discounted_price' => $discountedPrice,
        ]);
    }

    // Flash success message
    $request->session()->flash('success', 'Product added successfully!');

    // Redirect
    return redirect()->route('adminfrontend.product-add');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Request $request)
    {
        $id=$request->id;
        $product=Product::findorFail($id);
        $categories=Category::whereNotNull('category_id')->get();
        return view('adminfrontend.product-edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id=$request->id;
        $data= array(
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'quantity'=>$request->quantity,

        );
        if($request->hasFile('image')){
            $image=$request->file('image');
            $fileName=date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("uploads/"),$fileName);
            $data['image']=$fileName;
        }

        $create=Product::where('id',$id)->update($data);
        return redirect()->route('adminfrontend.product-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Request $request)
{
    $id = $request->id;
    $product = Product::find($id);

    if ($product) {
        // Delete the associated offer if it exists
        if ($product->offer) {
            $product->offer->delete();
        }

        // Delete the product
        $product->delete();

        return redirect()->route('adminfrontend.product-list')->with('success', 'Product deleted successfully.');
    } else {
        return redirect()->route('adminfrontend.product-list')->with('error', 'Product not found.');
    }
}


    public function createoffer($productId)
    {
        $product = Product::findOrFail($productId);
        return view('sellerfrontend.createoffer', compact('product'));
    }

    public function storeoffer(Request $request, $productId)
{
    $request->validate([
        'offer_name' => 'required|string|max:255',
        'discount_percentage' => 'required|numeric|between:0,100',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Find the product to get the original price
    $product = Product::findOrFail($productId);

    // Calculate the discounted price
    $discountedPrice = $product->price - ($product->price * ($request->discount_percentage / 100));

    Offer::create([
        'product_id' => $productId,
        'offer_name' => $request->offer_name,
        'discount_percentage' => $request->discount_percentage,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'discounted_price' => $discountedPrice, // Store the discounted price
    ]);

    return redirect()->route('sellerlisting')->with('success', 'Offer added successfully');
}

public function showOffers()
{
    $sellerId = auth()->user()->id; // Assuming the seller is authenticated
    $products = Product::whereHas('offers')->where('added_by', $sellerId)->with('offers')->get();

    return view('sellerfrontend.offerlist', compact('products'));
}

public function deleteOffer(Offer $offer)
{
    // Check if the authenticated seller owns this offer
    if (auth()->user()->id !== $offer->product->added_by) {
        abort(403, 'Unauthorized action.');
    }

    $offer->delete();

    return back()->with('success', 'Offer deleted successfully');
}


public function searchProducts(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('name', 'LIKE', "%{$query}%")->get();

    return view('frontend.searchedpage', compact('products', 'query'));
}



}
