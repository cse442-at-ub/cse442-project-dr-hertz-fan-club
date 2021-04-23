<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Query\Builder;
//use Illuminate\Support\Collection;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $email = $request->input('useremail');
        $data['useremail'] = $email;
        return view('auth.email-reset-password', $data);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = DB::table('users')->where('email', $request->email)->get();
        //$user = DB::table('users')->where('email', $request->email);

        //dd($user);
        $email = $request->email;
        //$useremail = $user->email;
        $useremail = $user[0]->email;

        if ( $email == $useremail) {

            $password = Hash::make($request->password);
//            DB::update(
//                'update users set password = $password where email = ?',
//                [$password, $email]
//            );

            DB::table('users')->where('email', $useremail)->update(array('password' => $password));
            //$user->password = Hash::make($request->password);

            //$user->save();

            return redirect()->route('main')->with(['success' => 'You successfully changed your password!']);
        }
        else{
            return redirect()->back()->withErrors(['reset_error' => 'Your current password is incorrect.']);
        }
    }
}
