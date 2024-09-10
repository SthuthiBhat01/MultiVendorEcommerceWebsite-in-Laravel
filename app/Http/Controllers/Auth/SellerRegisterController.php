<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Company;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;




class SellerRegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.sellersignup');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8','regex:/[@$!%*#?&]/','regex:/[0-9]/'],
            'password' => ['required'],
        ]);

                

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'seller',
            
            'phone_number' => $request->phone_number
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::EMAIL);
    }
}
// public function store(Request $request): RedirectResponse
// {
//     $request->validate([
//         'name' => ['required', 'string', 'max:255'],
//         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
//         'phone_number' => ['required', 'numeric']
//     ]);

//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//         'user_type' => 'seller',
//         'phone_number' => $request->phone_number
//     ]);

//     event(new Registered($user));

//     Auth::login($user);

//     // Check if the user has filled out their company details
//     if (!Company::where('seller_id', $user->id)->exists()) {
//         // Redirect to listyourcompany view if company details are not filled out
//         return redirect()->route('listcompany');
//     } else {
//         // Redirect to sellerhome (dashboard) if company details are filled out
//         return redirect()->route('sellerpage');
//     }
// }
// }