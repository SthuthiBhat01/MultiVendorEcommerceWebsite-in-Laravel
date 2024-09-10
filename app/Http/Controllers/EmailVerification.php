<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerification extends Controller
{
    public function EmailMsg()
    {
        return view('email_notifiaction');
    }
}
