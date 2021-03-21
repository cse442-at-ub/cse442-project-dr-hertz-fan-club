<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function store(Request $request){
        dd($request->only('inputName','inputEmail','inputPhoneNumber', 'topic', 'contactDescription'));


        return view(route('contactus'));
    }
}
