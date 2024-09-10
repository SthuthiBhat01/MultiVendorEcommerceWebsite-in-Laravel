<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BusinessUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Basic validation rules
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'min:8','regex:/[@$!%*#?&]/','regex:/[0-9]/'],
        'phone_number' => ['required', 'numeric','regex:/^[0-9]{10}$/'],
        'user_type' => ['required', 'in:individual,business'],
    ];

    // Additional validation rules for business users
    if ($request->user_type === 'business') {
        $rules = array_merge($rules, [
            'company_name' => ['required_if:user_type,business', 'string', 'max:255'],
            'company_email' => ['required_if:user_type,business', 'string', 'email', 'max:255'],
            'company_phone_number' => ['required_if:user_type,business', 'numeric','regex:/^[0-9]{10}$/'],
            'gstin' => ['required_if:user_type,business', 'string', 'regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/' ],
            'company_logo' => ['required_if:user_type,business', 'image', 'max:1024'],
            'company_pincode' => ['required_if:user_type,business', 'numeric'],
        ]);
    }

    // Validate the request
    $request->validate($rules);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'user_type' => 'user',
        'phone_number' => $request->phone_number,
    ]);

    // If user type is business, create a business user
    if ($request->user_type === 'business') {
        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
        }

        BusinessUser::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone_number' => $request->company_phone_number,
            'gstin' => $request->gstin,
            'company_logo' => $logoPath,
            'company_pincode' => $request->company_pincode,
        ]);
    }

    // Dispatch the registered event and log the user in
    event(new Registered($user));
    Auth::login($user);

    

    // Redirect to the email verification route
    return redirect(RouteServiceProvider::EMAIL);
}

}
