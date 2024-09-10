<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Company;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $user = $request->user();

         Auth::login($user);
         $userId = $user->id;
        session(['user_id' => $userId]);

// Redirect based on user_type
if ($user->user_type === 'admin') {
    return redirect(RouteServiceProvider::ADMINHOME);
} elseif ($user->user_type === 'seller') {
    if (!Company::where('seller_id', $user->id)->exists()) {
        // Redirect to listyourcompany view if company details are not filled out
        return redirect(RouteServiceProvider::COMPDETAIL);
    } else {
        // Redirect to sellerhome (dashboard) if company details are filled out
        return redirect(RouteServiceProvider::SELLERHOME);
    }
} else {
    return redirect(RouteServiceProvider::HOME);
}

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
