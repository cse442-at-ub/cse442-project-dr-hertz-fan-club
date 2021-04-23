<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Textbook;
use App\Models\House;
use App\Models\Roommate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;
        $textbook_title = $request->textbook_title;
        $house_title = $request->house_title;
        $room_title = $request->roommate_title;
        $title = $request->generic_title;

        //validation
        if ($textbook_title != NULL) {
            $request->validate([
                'textbook_title' => 'required|string|max:50',
                'textbook_condition' => 'required',
                'course' => 'required',
                'course_num' => 'required|numeric|regex:/[0-9]{3}/',
                'price' => 'required|numeric|regex:/[0-9]/',
                'textbookDescription' => 'required|string|max:255',
            ]);
        } else if ($house_title != NULL) {
            $request->validate([
                'house_name' => 'required|string|max:50',
                'textbook_condition' => 'required',
                'course' => 'required',
                'course_num' => 'required|numeric|regex:/[0-9]{3}/',
                'price' => 'required|numeric|regex:/[0-9]/',
                'textbookDescription' => 'required|string|max:255',
            ]);
        }


        if ($textbook_title != NULL) {
            $textbook_con = $request->textbook_condition;
            $course = $request->course;
            $course_num = $request->course_num;
            $price = $request->price;
            $description = $request->textbookDescription;
            DB::table('textbook')->insert([
                'title' => $textbook_title,
                'condition' => $textbook_con,
                'course' => $course,
                'course_num' => $course_num,
                'price' => $price,
                'description' => $description,
                'user_id' => $user_id
            ]);
        } else if ($house_title != NULL) {
            $type = $request->housingType;
            $bedrooms = $request->bedrooms;
            $bathrooms = $request->bathrooms;
            $description = $request->housingDescription;
            $adress = $request->address;
            DB::table('house')->insert([
                'id' => NULL,
                'title' => $house_title,
                'house_type' => $type,
                'bedroom_num' => $bedrooms,
                'bathroom_num' => $bathrooms,
                'description' => $description,
                'address' => $adress,
                'user_id' => $user_id
            ]);

        } else if ($room_title != NULL) {
            $roommates = $request->roommates;
            $preference = $request->preference;
            $description = $request->roommateDescription;
            $adress = $request->address;
            DB::table('roommate')->insert([
                'id' => NULL,
                'title' => $room_title,
                'roommate_num' => $roommates,
                'roommate_gen' => $preference,
                'description' => $description,
                'user_id' => $user_id
            ]);

        } else {
            $title = $request->generic_title;
            $con = $request->conditionGeneric;
            $sellOption = $request->sellOption;
            $description = $request->genericDescription;
            $adress = $request->address;
            DB::table('everything')->insert([
                'id' => NULL,
                'title' => $title,
                'condition' => $con,
                'description' => $description,
                'user_id' => $user_id
            ]);


        }

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);

    }

    public function delete($type, $id)
    {

        //need to add user verification here later

        if ($type == "textbook") {
            DB::table('textbook')->where('id', $id)->delete();
            return Redirect::back()->with(['success' => 'You successfully delete a post!']);
        } elseif ($type == "roommate") {
            DB::table('roommate')->where('id', $id)->delete();
            return Redirect::back()->with(['success' => 'You successfully delete a post!']);
        } elseif ($type == "house") {
            DB::table('house')->where('id', $id)->delete();
            return Redirect::back()->with(['success' => 'You successfully delete a post!']);
        } elseif ($type == "general") {
            DB::table('everything')->where('id', $id)->delete();
            return Redirect::back()->with(['success' => 'You successfully delete a post!']);
        }
        return Redirect::back()->withErrors('Fail to delete the post. Please try again.');
    }

    //implement in the future
    public function edit($id)
    {

    }

}
