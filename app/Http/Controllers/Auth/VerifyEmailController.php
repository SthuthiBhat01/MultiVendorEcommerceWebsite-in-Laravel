<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\RedirectResponse;

// class VerifyEmailController extends Controller
// {
//     /**
//      * Mark the authenticated user's email address as verified.
//      */
//     public function __invoke(EmailVerificationRequest $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(RouteServiceProvider::LOGIN.'?verified=1');
//         }

//         if ($request->user()->markEmailAsVerified()) {
//             event(new Verified($request->user()));
//         }

//         return redirect()->intended(RouteServiceProvider::LOGIN.'?verified=1');
//     }
// }


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Directly redirect to listyourcompany page after email verification
            return redirect()->route('listcompany');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // If the email is not verified yet, redirect to the intended route or default to login
        // Inside your controller method that verifies the email
return redirect()->intended(RouteServiceProvider::LOGIN.'?verified=1')->with('success', 'Email verified successfully');

    }
}
