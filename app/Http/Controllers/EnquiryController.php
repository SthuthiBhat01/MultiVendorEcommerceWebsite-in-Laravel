<?php
namespace App\Http\Controllers;

use App\Models\EnquiryDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;

use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'seller_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'quantity' => 'required|integer|min:1',
        ]);

        // Store enquiry details in the database
        $enquiry = EnquiryDetail::create($validated);

        // Get product details
        $product = Product::findOrFail($request->product_id);

        // Get seller details
        $seller = User::findOrFail($request->seller_id);

        // Send enquiry details to the seller via email
        Mail::to($seller->email)->send(new EnquiryMail($enquiry, $product, $seller));

        return back()->with('success', 'Enquiry sent successfully!');
    }


    public function showEnquiryNotification()
    {
        $sellerId = Auth::id();
    
        // Fetch enquiries for the logged-in seller
        $enquiries = EnquiryDetail::with('product')
        ->where('seller_id', $sellerId)
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('sellerfrontend.enquiry_notification', compact('enquiries'));
    }

    
    public function markAsSeen(Request $request)
    {
        EnquiryDetail::where('seller_id', Auth::id())->where('seen', false)->update(['seen' => true]);
        return response()->json(['status' => 'success']);
    }
}


