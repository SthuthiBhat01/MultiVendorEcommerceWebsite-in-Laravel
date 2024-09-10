<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\SubscriptionPlan;
use App\Models\EnquiryDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SellerView extends Controller
{
    public function SellerPage(Request $request)
    {
        $sellerId = Auth::id(); // Get the authenticated user's ID
    
        // Get active listings count for the authenticated seller
        $activeListingsCount = \DB::table('products')
            ->where('added_by', $sellerId) // Ensure this matches the added_by column in products
            
            ->count();
    
        // Get total users count
        $totalUsersCount = \DB::table('users')->count();
    
        // Get received enquiries count for the authenticated seller
        $receivedEnquiriesCount = \DB::table('enquiry_details')
            ->where('seller_id', $sellerId)
            ->count();
    
        // Pass the counts to the view
        return view('sellerfrontend.sellerdashboard', [
            'activeListingsCount' => $activeListingsCount,
            'totalUsersCount' => $totalUsersCount,
            'receivedEnquiriesCount' => $receivedEnquiriesCount,
        ]);
    }
    

    public function sellerprofile(Request $request ){
          // Fetch the currently authenticated user
          $user = $request->user();

          // Fetch the user's company details
          $company = $user->company;

          // Correctly pass the user and company data to the view
          return view('sellerfrontend.sellerprofile', compact('user', 'company'));
    }

    public function updateProfile(Request $request)
    {
        $id = $request->id; // Assuming the ID is passed in the request
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. $request->user()->id,
            'phonenumber' => 'required|string|max:20|size:10|regex:/^[0-9]{10}$/',
            'address' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'GSTIN' => 'required|string|size:15|regex:/^[0-9A-Z]{15}$/',
            'website_link' => 'required|string|url|max:255',
            'pincode' => 'required|string|max:10',
            'region' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
        ];
    
        // Apply validation rules
        $validatedData = $request->validate($rules);
    
        // Retrieve the user and company instances
        $user = $request->user();
        $company = $user->company;
    
        // Update user fields
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phonenumber'],
        ]);
    
        // Update company fields
        $company->update([
            'company_name' => $validatedData['company_name'],
            'GSTIN' => $validatedData['GSTIN'],
            'website_link' => $validatedData['website_link'],
            'address' => $validatedData['address'],
            'pincode' => $validatedData['pincode'],
            'region' => $validatedData['region'],
            'country' => $validatedData['country'],
        ]);
    
        // Initialize the data array with validated data
        $data = [
            'company_name' => $validatedData['company_name'],
            'GSTIN' => $validatedData['GSTIN'],
            'website_link' => $validatedData['website_link'],
            'address' => $validatedData['address'],
            'pincode' => $validatedData['pincode'],
            'region' => $validatedData['region'],
            'country' => $validatedData['country'],
        ];
    
        // Handle the profile image upload
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = date('dmY'). time(). '.'. $img->getClientOriginalExtension();
            $img->move(public_path("uploads/"), $fileName);
            $data['img'] = $fileName;
        }
    
        // Update the company record with the new data
        $company->update($data);
    
        // Redirect or return response...
        return redirect()->route('sellerfrontend.sellerprofile')->with('success', 'Profile updated successfully.');
    }
    

   

        public function selleraddproducts(Request $request){
            $categories=Category::whereNotNull('category_id')->get();
            $phoneNumber = auth()->user()->phone_number; // This line retrieves the authenticated user's phone number
            $user = auth()->user(); // Optionally, you might want to keep this line if you need the entire user object elsewhere
            $company = $user->company;
            // dd(compact('categories','phoneNumber','company'));
        
            return view('sellerfrontend.selleraddproducts',compact('categories','phoneNumber','company'));
        }
        


        public function selleraddproductspost(Request $request)
{
    // Extract submitted category ID or new subcategory name
    $submittedCategoryId = $request->input('category_id');

    // Check if the submitted value matches an existing category ID
    $existingCategory = Category::find($submittedCategoryId);

    if (!$existingCategory) {
        // Handle new subcategory
        if ($submittedCategoryId == 'new') {
            $newSubcategoryName = $request->input('new_subcategory_name');
            $mainCategoryId = 44; // Assuming "Other" has ID 44

            // Create new subcategory
            $subcategoryData = [
                'name' => $newSubcategoryName,
                'category_id' => $mainCategoryId,
                'status' => '1',
            ];

            $newSubcategory = Category::create($subcategoryData);

            // Set the category_id to the ID of the newly created subcategory
            $submittedCategoryId = $newSubcategory->id;
        } else {
            // Return an error or handle the case where a non-existing category ID is provided
            return redirect()->back()->withErrors(['category_id' => 'Invalid category ID']);
        }
    }

    $data = [
        'name' => $request->name,
        'category_id' => $submittedCategoryId,
        'price' => $request->price,
        'slug' => $request->slug,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'added_by' => $request->input('created_by'),
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("uploads/"), $fileName);
        $data['image'] = $fileName;
    }

    // Create the product with the provided data
    Product::create($data);

    return redirect()->route('selleraddproducts');
}

        

    public function sellerdashboardlisting(Request $request){
        if (!$request->user()) {
            abort(403, 'Unauthorized action.');
        }
        // Fetch products added by the currently logged-in user
        $products = Product::where('added_by', $request->user()->id)->get();
    
        // Get the company details associated with the currently logged-in user
        $user = $request->user();
        $company = $user->company; // This assumes you have a relationship defined for company in your User model
    
        return view('sellerfrontend.sellerdashboardlisting', compact('products', 'company'));
    }
    
    public function edit(Product $product)
{
    
    return view('sellerfrontend.product-edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = $product->image;
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $imageName);
    }

    $product->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'image' => $imageName,
    ]);

    return redirect()->route('sellerlisting')->with('success', 'Product updated successfully.');
}


public function destroyproduct(Request $request, $id)
{
    $product = Product::find($id);

    if ($product) {
        $product->delete();
        return redirect()->route('sellerlisting')->with('success', 'Product deleted successfully.');
    }

    return redirect()->route('sellerlisting')->with('error', 'Product not found.');
}



    public function viewReports()
    {
        // Fetching enquiry count for each month
        $enquiryCounts = EnquiryDetail::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();
    
        // Prepare data points for the chart
        $dataPoints = [];
        foreach ($enquiryCounts as $enquiry) {
            $dataPoints[] = [
                "y" => $enquiry->count,
                "label" => Carbon::parse($enquiry->month)->format('M, Y')
            ];
        }
    
        return view('sellerfrontend.view_report', compact('dataPoints'));
    }

    
    
}