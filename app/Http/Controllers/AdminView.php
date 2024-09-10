<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\NewsEvents;
use App\Models\BusinessUser;
use Illuminate\Validation\Rules;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use App\Models\EnquiryDetail;

class AdminView extends Controller
{

    public function adminindex() {
        // Count of users registered today
        $totalSignups = User::count();
    
        // Count of vendors and buyers
        $vendorsCount = User::where('user_type', 'seller')->count();
        $buyersCount = User::where('user_type', 'user')->count();
        
        // Fetching enquiry count from enquiry_details table
        $enquiriesCount = EnquiryDetail::count();
    
        // Prepare user count data for the chart
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)
                                   ->whereMonth('created_at', Carbon::now()->month)
                                   ->count();
        $before_1_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(1))
                                    ->count(); 
        $before_2_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(2))
                                    ->count();
        $before_3_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(3))
                                    ->count();
        $usersCount = array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);
    
        // Fetch seller enquiries data
        $sellerEnquiries = \DB::table('enquiry_details')
            ->select('users.name', \DB::raw('count(enquiry_details.id) as enquiry_count'))
            ->join('users', 'enquiry_details.seller_id', '=', 'users.id')
          
            ->groupBy('users.name')
            ->get();
    
        // Prepare data for the seller enquiries chart
        $sellerChartDataPoints = [];
        foreach ($sellerEnquiries as $enquiry) {
            $sellerChartDataPoints[] = [
                "y" => $enquiry->enquiry_count,
                "label" => $enquiry->name
            ];
        }
    
        return view('adminfrontend.index', compact('totalSignups', 'vendorsCount', 'buyersCount', 'enquiriesCount', 'usersCount', 'sellerChartDataPoints'));
    }
    
  
   
    public function userlist()
    {
        $users = User::where('user_type', 'user')->select('id', 'name', 'email' ,'phone_number','created_at')->get();
        
        return view('adminfrontend.user-list', compact('users'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'user_type' => 'user', // default user type
        ]);

        return redirect()->route('user-list')->with('success', 'User added successfully');
    }
    
    public function destroyuser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('user-list')->with('success', 'User deleted successfully.');
}

public function destroyvendor($id){
    $user=User::findOrFail($id);
    $user->delete();
    return redirect()->route('vendor.list')->with ('success','Vendor deleted successfully');

}

    public function adminuserprofile()
    {
        $admin = Auth::user()->load('company'); 

        $sellerId = Auth::id();
    
        // Fetch enquiries for the logged-in seller
        $enquiries = EnquiryDetail::where('seller_id', $sellerId)->orderBy('created_at', 'desc')->get();
    
        return view('adminfrontend.user-profile', compact('admin','enquiries'));
    }

    public function adminupdateProfile(Request $request)
{
    $request->validate([
        'name' =>'required|string|max:255',
        'email' =>'required|string|email|max:255',
        'phone_number' =>'required|string|max:15',
        'password' => 'nullable|string|min:8|confirmed',
        'company_name' =>'required|string|max:255',
        'GSTIN' =>'required|string|max:255|unique:companydetails,GSTIN,'. Auth::id(). ',seller_id',
        'website_link' => 'nullable|url',
        'address' =>'required|string',
        'country' =>'required|string',
        'city' =>'required|string',
        'region' =>'required|string',
        'pincode' =>'required|string',
        'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $admin = Auth::user();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->phone_number = $request->phone_number;

    if ($request->password) {
        $admin->password = bcrypt($request->password);
    }

    $admin->save();

    // Update or create company details
    $companyDetails = $admin->company; // Attempt to retrieve existing company details

    if (!$companyDetails) {
        $companyDetails = new CompanyDetail(); // Create a new instance if none exists
    }

    $companyDetails->seller_id = $admin->id; // Ensure the seller_id is always set
    $companyDetails->company_name = $request->company_name;
    $companyDetails->GSTIN = $request->GSTIN;
    $companyDetails->website_link = $request->website_link;
    $companyDetails->address = $request->address;
    $companyDetails->country = $request->country;
    $companyDetails->city = $request->city;
    $companyDetails->region = $request->region;
    $companyDetails->pincode = $request->pincode;

    if ($request->hasFile('img')) {
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $imageName);
        $companyDetails->img = $imageName;
    }

    $companyDetails->save();

    return redirect()->back()->with('success', 'Profile and company details updated successfully.');
}

    
    public function showBusinessUsers()
    {
        $businessUsers = BusinessUser::all();
        return view('adminfrontend.business-userlist', compact('businessUsers'));
    }
    public function storeBusinessClient(Request $request)
    {
        // Basic validation rules
        $rules = [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required','min:8','regex:/[@$!%*#?&]/','regex:/[0-9]/'],
            'phone_number' => ['required', 'regex:/^[0-9]{10}$/'],
        ];

        // Additional validation rules for business users
        $rules = array_merge($rules, [
            'company_name' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'company_phone_number' => ['required', 'numeric'],
            'gstin' => ['required','string','unique:companydetails','regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/'],
            'company_logo' => ['required', 'image', 'max:1024'],
            'company_pincode' => ['required', 'numeric'],
        ]);

        // Validate the request
        $request->validate($rules);

        // Create the user
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'user',
            'phone_number' => $request->phone_number,
        ]);

        // Upload the company logo if provided
        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
        }

        // Create the business user
        BusinessUser::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone_number' => $request->company_phone_number,
            'gstin' => $request->gstin,
            'company_logo' => $logoPath,
            'company_pincode' => $request->company_pincode,
        ]);

        return redirect()->route('business.users.list')->with('success', 'Business client added successfully.');
    }

    //ends here


    
    public function vendorlist()
    {
        $vendors = User::where('user_type', 'seller')
                       ->join('companydetails', 'users.id', '=', 'companydetails.seller_id')
                       ->select('users.name', 'users.email', 'users.phone_number', 'users.created_at',
                               'companydetails.company_name', 'companydetails.gstin', 'companydetails.website_link',
                               'companydetails.address', 'companydetails.country', 'companydetails.city',
                               'companydetails.region', 'companydetails.pincode','companydetails.status','companydetails.seller_id','companydetails.img')
                       ->distinct() // Ensures that each seller is listed once, even if they have multiple entries in the companydetails table
                       ->get();
    
        return view('adminfrontend.vendor-list', compact('vendors'));
    }

    public function addvendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Step 1 validation
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|regex:/^[0-9]{10}$/',
            'password' => 'required|string|min:8|regex:/[@$!%*#?&]/|regex:/[0-9]/',
    
            // Step 2 validation
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'GSTIN' => 'required|string|unique:companydetails|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/',
            'company_website' => 'nullable|url|regex:/^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        DB::transaction(function () use ($request) {
            // Store user details
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'user_type' => 'seller',
            ]);

            // Store company details
            $companyDetails = new Company;
            $companyDetails->seller_id = $user->id;
            $companyDetails->company_name = $request->company_name;
            $companyDetails->address = $request->company_address;
            $companyDetails->gstin = $request->GSTIN;
            $companyDetails->website_link = $request->company_website;
            $companyDetails->country = $request->country;
            $companyDetails->city = $request->city;
            $companyDetails->region = $request->region;
            $companyDetails->pincode = $request->pincode;

            if ($request->hasFile('img')) {
                $imageName = time().'.'.$request->img->extension();
                $request->img->move(public_path('uploads/'), $imageName);
                $companyDetails->img = $imageName;
            }

            $companyDetails->save();
        });

        return redirect()->route('vendor.list')->with('success', 'Vendor added successfully.');
    }

    

            
            public function updateVendorStatus(Request $request){
                if($request->ajax()){
                    $data=$request->all();
                    
                    // Determine the new status based on the incoming data
                    $status = $data['status'] === 'Active'? 0 : 1;
                    
                    // Update the vendor status in the database
                    Company::where('seller_id', $data['seller_id'])->update(['status' => $status]);
                    
                    // Return a JSON response indicating success
                    return response()->json(['status' => $status, 'seller_id' => $data['seller_id'], 'message' => 'Vendor Status Updated Successfully.']);
                }
            }
            
       

            
       
            public function addcareers(){
                return view ('adminfrontend.Careers.add-careers');
            }

            public function addtestimonials(){
                return view ('adminfrontend.Testimonials.add-testimonial');
            }
    
    
public function adddinfodetails(){
    return view('adminfrontend.add-addtionalinfo');
}
    

public function enquirylist()
{
    // Fetch all enquiries with related product, seller, and company details
    $enquiries = EnquiryDetail::with(['product', 'seller.company'])->orderBy('created_at', 'desc')->get();

    return view('adminfrontend.admin-enquirylist', compact('enquiries'));
}
    

    
    
    
    public function vendorprofile(){
        return view('adminfrontend.vendor-profile');
    }


  

    //repots functions here 

    public function viewUsersCharts(){
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)
                                   ->whereMonth('created_at', Carbon::now()->month)
                                   ->count();
        $before_1_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(1))
                                    ->count(); 
        $before_2_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(2))
                                    ->count();
        $before_3_month_users = User::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth(3))
                                    ->count();
        $usersCount = array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);
    
        // Fetch seller enquiries data
        $sellerEnquiries = \DB::table('enquiry_details')
            ->select('users.name', \DB::raw('count(enquiry_details.id) as enquiry_count'))
            ->join('users', 'enquiry_details.seller_id', '=', 'users.id')
            
            ->groupBy('users.name')
            ->get();
    
        // Prepare data for the chart
        $sellerChartDataPoints = [];
        foreach ($sellerEnquiries as $enquiry) {
            $sellerChartDataPoints[] = [
                "y" => $enquiry->enquiry_count,
                "label" => $enquiry->name
            ];
        }
    
        return view('adminfrontend.view_users_charts', compact('usersCount', 'sellerChartDataPoints'));
    }
    
    public function enquiryview()
    {
        $adminId = Auth::id();
    
        // Fetch enquiries for the logged-in seller
        $enquiries = EnquiryDetail::with('product')
        ->where('seller_id', $adminId)
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('adminfrontend.admin-enquiryview', compact('enquiries'));
    }

    
    
}
