<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.reset-password');
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request->get('old_password'));

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        //check if new password is different from the old one.
        if ($request->old_password == $request->password) {
            return redirect()->back()->withErrors(['reset_error' => 'Your new password must be different from your previous password.']);
        }

        // Check if the current password is correct
        // then update the password and save
        // if success, logout the user. If not, show error message
        $user = Auth::user();
        if ( Hash::check($request->get('old_password'), $user->getAuthPassword()) ) {

            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect()->route('main')->with(['success' => 'You successfully changed your password!']);
        }
        else{
            return redirect()->back()->withErrors(['reset_error' => 'Your current password is incorrect.']);
        }

    }
}
