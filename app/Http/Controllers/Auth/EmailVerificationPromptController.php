<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed');
        $this->middleware('throttle:6,1')->only('resend');
        $this->middleware('verified');
    }
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // return $request->user()->hasVerifiedEmail()
        //             ? redirect()->intended(RouteServiceProvider::HOME)
        //             : view('auth.verify-email');

        return $request->user()->hasVerifiedEmail()
        ? redirect()->intended(RouteServiceProvider::LOGIN)
        : view('auth.verify-email');

    }
}
