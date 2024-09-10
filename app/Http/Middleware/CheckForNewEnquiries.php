<?php

// app/Http/Middleware/CheckForNewEnquiries.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryDetail;

class CheckForNewEnquiries
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'seller') {
            $unseenEnquiries = EnquiryDetail::where('seller_id', Auth::id())
                                             ->where('seen', false)
                                             ->exists();
            if ($unseenEnquiries) {
                session()->flash('newEnquiries', true);
            }
        }

        return $next($request);
    }
}
