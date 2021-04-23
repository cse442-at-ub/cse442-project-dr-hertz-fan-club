<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Mail;

class ForgotPasswordController extends Controller
{

    public function index(){
        return view('auth.forgotpassword');
    }

    public function store(Request $request){
        $request->validate([
            'useremail' => 'required|string|email|max:255|regex:/(.*)\@buffalo\.edu$/i',
        ]);

        $email = $request->useremail;

        $link = URL::temporarySignedRoute('forget.password', now()->addMinutes(10), ['email' => $email]);
        Mail::to($email)->send(new ForgotPasswordMail($email, $link));

        # For some reason, it works if it redirects to main, but it doesn't show in landing or verify page.
        return redirect()->route('landing')->with('success', 'A verification link as been sent to your email. Please check your email to complete your registration!');

    }


}
