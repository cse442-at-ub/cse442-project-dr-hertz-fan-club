<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Mail\ContactUsConfirmationMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function store(Request $request){
#        dd($request->only('inputName','inputEmail','inputPhoneNumber', 'topic', 'contactDescription', 'inputFile'));
        if($request->input('inputPhoneNumber')!=null){
            $this->validate($request,[
                'inputName' => 'required|string',
                'inputEmail' => 'required|string|email',
                'inputPhoneNumber' => 'numeric|regex:/[0-9]{9}/',
                'topic' => 'required',
                'contactDescription' => 'required'
            ]);
        } else {
            $this->validate($request,[
                'inputName' => 'required|string',
                'inputEmail' => 'required|string|email',
                'topic' => 'required',
                'contactDescription' => 'required'
            ]);
        }


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

        return redirect()->route('contactus')->with('success','Your message has been sent! We will contact you as soon as we can! Feel free to close this page');
#        return view(route('contactus'));
    }
}
