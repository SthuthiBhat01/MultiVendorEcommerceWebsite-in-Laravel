<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\BusinessUser;
use App\Models\AdditionalDetail;
use App\Models\Careers;
use App\Models\NewsEvents;
use App\Models\Testimonial;


class HomeController extends Controller
{

    public function Index(){
        return view ('dashboard');
    }

    public function aboutus(){
        return view('frontend.aboutus');
    }


    public function listcompany()
    {
        $user = auth()->user();
        return view('sellerfrontend.listcompany', ['email' => $user->email]);
    }

    public function listcompanypost(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'company_name' => 'required|string',
            'gstin' => 'required|string|unique:companydetails|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/',
            
            'website_link' => 'nullable|url|regex:/^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/|max:255',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'pincode' => 'required|string',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Use 'logo' instead of 'img'
        ]);
        // echo '<pre>';
        // print_r($req->all());
        // echo '<pre>';
        $data = [
            'seller_id' => auth()->user()->id,
            'company_name' => $request->company_name,
            'gstin' => $request->gstin,
            'website_link' => $request->website_link,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'region' => $request->region,
            'pincode' => $request->pincode,
        ];
        // if ($request->hasFile('logo')) { // Use 'logo' instead of 'img'
        //     $logo = $request->file('logo');
        //     $fileName = date('dmY').time(). '.'. $logo->getClientOriginalExtension();
        //     $logo->move(public_path("uploads/"), $fileName);
        //     $data['img'] = '/uploads/'. $fileName; // Ensure the path starts with '/'
        // }
        // Create a new company record
        Company::create($data);

        return redirect()->route('sellerpage');
    }



    public function indexv4(Request $request)
{
    $products = Product::take(4)->get();
    $testimonials = Testimonial::all();
    $companyDetails = Company::where('id', '!=', 11)->get();
    $business = BusinessUser::all();

    $cartItems = [];
    $user = Auth::user();

    

    // Fetch all categories
    $categories = Category::all();
    // Group categories by category_id to create a hierarchical structure
    $groupedCategories = [];
    foreach ($categories as $category) {
        if ($category->category_id === null) { // Main category
            $groupedCategories[$category->id] = [
                'main' => $category,
                'subcategories' => [],
            ];
        } else { // Subcategory
            $groupedCategories[$category->category_id]['subcategories'][] = $category;
        }
    }
    
    // Fetch fresh recommendations
    $freshRecommendations = Product::orderBy('created_at', 'desc')->take(5)->get();

    // Search logic
    $productName = $request->input('product_name');
    $categoryName = $request->input('category_name');

 
    return view('frontend.indexv4',compact('groupedCategories', 'products', 'freshRecommendations', 'testimonials', 'companyDetails', 'business', 'cartItems', 'user', 'productName', 'categoryName'));
}
    


    public function showlist()
{
    // Fetch categories with all products and their related offers
    $categories = Category::with(['products' => function($query) {
        $query->with('offers'); // Include offers for each product
    }])->get();
    
    // Group categories by category_id to create a hierarchical structure
    $groupedCategories = [];
    foreach ($categories as $category) {
        if ($category->category_id === null) { // Main category
            $groupedCategories[$category->id] = [
                'main' => $category,
                'subcategories' => [],
            ];
        } else { // Subcategory
            $groupedCategories[$category->category_id]['subcategories'][] = $category;
        }
    }

    return view('frontend.show-list', compact('groupedCategories'));
}

    
    


public function showdetails($productId)
{
    // Fetch product along with the user and offers
    $product = Product::with(['user', 'offers'])->find($productId);

    if (!$product) {
        abort(404); // Return a 404 error if the product does not exist
    }

    $sellerName = $product->user ? $product->user->name : ' Seller';
    $toUserId = $product->added_by ?? null;

    // Manually find the company details associated with the product's seller
    $companyDetail = Company::where('seller_id', $product->user->id)->first();

    return view('frontend.viewdetails', compact('product', 'sellerName', 'toUserId', 'companyDetail'));
}


    public function contactus(){
        return view('frontend.contactus');
    }
  

    public function dashboard(){
        $user = Auth::user(); // Retrieve the logged-in user
        return view('frontend.dashboard', ['user' => $user]);
        
    }

    public function dashboardaddlisting(){
        $user=Auth::user() ;  //Retriving the user here 
        return view('frontend.dashboardaddlisting', compact( 'user'));
    }

    public function dashboardmyprofile()
    {
        $user = Auth::user();
        $businessUser = BusinessUser::where('user_id', $user->id)->first();
    
        return view('frontend.myprofile', compact('user', 'businessUser'));
    }
    

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|numeric',
            'company_name' => 'nullable|string|max:255',
            'company_email' => 'nullable|string|email|max:255',
            'company_phone_number' => 'nullable|numeric',
            'gstin' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|max:1024',
            'company_pincode' => 'nullable|numeric',
        ]);
    
        // Update user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
    
        // Update business user data if applicable
        $businessUser = BusinessUser::where('user_id', $user->id)->first();
        if ($businessUser) {
            if ($request->hasFile('company_logo')) {
                $logoPath = $request->file('company_logo')->store('company_logos', 'public');
                $businessUser->company_logo = $logoPath;
            }
    
            $businessUser->update([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone_number' => $request->company_phone_number,
                'gstin' => $request->gstin,
                'company_pincode' => $request->company_pincode,
            ]);
        }
    
        return redirect()->route('userprofile')->with('success', 'Profile updated successfully!');
    }
    
    
    public function dashboardreviews(){
        return view('frontend.dashboardreviews');
    }
    public function dashboardwishlist(){
        return view('frontend.dashboardwishlist');
    }

    public function newsv2(){
        $newsEvents = NewsEvents::all();
        return view('frontend.newsv2',compact('newsEvents'));
    }

    public function termsconditions(){
        $details = AdditionalDetail::all();

        return view('frontend.termsconditions',compact('details'));
    }

    public function careeers(){
        $careers = Careers::all();
        return view('frontend.careers',compact('careers'));
    }

    public function testimonials(){
        $testimonials = Testimonial::all();
        return view('frontend.testimonials',compact('testimonials'));
    }


}
