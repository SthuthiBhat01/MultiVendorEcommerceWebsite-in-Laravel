<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use App\Models\Company;

use Illuminate\View\View;

class SellerLoginController extends Controller
{
    public function create(): View
    {
        return view('auth.sellerlogin');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();
        session(['user_id' => $user->id]);

        
       
        
// Check if the user has filled out their company details
if (!Company::where('seller_id', $user->id)->exists()) {
    // Redirect to listyourcompany view if company details are not filled out
    return redirect()->route('listcompany');
} else {
    // Redirect to sellerhome (dashboard) if company details are filled out
    return redirect()->route('sellerpage');
}
}


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
