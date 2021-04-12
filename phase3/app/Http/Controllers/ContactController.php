<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ContactUsMail;
use App\Mail\ContactUsConfirmationMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function store(Request $request){
#        dd($request->only('inputName','inputEmail','inputPhoneNumber', 'topic', 'contactDescription', 'inputFile'));
#        $this->validate($request,[
#            'inputName' => 'required|string',
#            'inputEmail' => 'required|string|email',
#            'topic' => 'required|string',
#            'contactDescription' => 'required|string'
#        ]);
        
        $name = $request->inputName;
        $email = $request->inputEmail;
        $phone = $request->inputPhoneNumber;
        $topic =  $request->topic;
        $message =  $request->contactDescription;
        $file = $request->inputFile;

#        Mail::to('CSE442TestingPurposes@gmail.com')->send(new ContactUsMail());

        # This one is sent to the developers/website owner.
        Mail::to('CSE442TestingPurposes@gmail.com')->send(new ContactUsMail($name, $email, $phone, $topic, $message, $file));

        #This one is sent to the user.
        Mail::to($email)->send(new ContactUsConfirmationMail($name, $email, $topic, $message, $file));

        return redirect()->route('main')->with('success','Your message has been sent! We will contact you as soon as we can!');
#        return view(route('contactus'));
    }
}
