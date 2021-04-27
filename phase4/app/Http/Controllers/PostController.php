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
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

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
                'textbookfile' => 'required',
            ]);
        } /* else if ($house_title != NULL) {
            $request->validate([
                'house_name' => 'required|string|max:50',
                'textbook_condition' => 'required',
                'course' => 'required',
                'course_num' => 'required|numeric|regex:/[0-9]{3}/',
                'price' => 'required|numeric|regex:/[0-9]/',
                'textbookDescription' => 'required|string|max:255',
                'housingfile' => 'required',
            ]);
        } */


        if ($textbook_title != NULL) {
            $textbook_con = $request->textbook_condition;
            $course = $request->course;
            $course_num = $request->course_num;
            $price = $request->price;
            $description = $request->textbookDescription;
            $textbookfile = $request->textbookfile;
            $image = serialize(array());
            DB::table('textbook')->insert([
                'title' => $textbook_title,
                'con' => $textbook_con,
                'course' => $course,
                'course_num' => $course_num,
                'price' => $price,
                'description' => $description,
                'user_id' => $user_id,
                'files' => $image
            ]);
            
            $image = unserialize($image);
            $id = DB::getPdo()->lastInsertId(); 
            $lastpost = DB::table('textbook')->where('id', $id)->limit(1);

            foreach ($request->textbookfile as $file) {
                Storage::disk('public')->putFileAs("textbook/" . $id, $file, $file->getClientOriginalName());
            }
            $files = Storage::disk('public')->allFiles("textbook/" . $id);
            
            foreach ($files as $filepath) {
                //dd($filepath, Storage::url($filepath));
                array_push($image, $filepath);
            }
            $image = serialize($image);
            $lastpost->update([
                'files' => $image
            ]);

            //$lastpost->save();

        } else if ($house_title != NULL) {
            $type = $request->housingType;
            $bedrooms = $request->bedrooms;
            $bathrooms = $request->bathrooms;
            $description = $request->housingDescription;
            $adress = $request->address;
            $housefile = $request->housefile;
            $image = serialize(array());
            DB::table('house')->insert([
                'id' => NULL,
                'title' => $house_title,
                'house_type' => $type,
                'bedroom_num' => $bedrooms,
                'bathroom_num' => $bathrooms,
                'description' => $description,
                'address' => $adress,
                'user_id' => $user_id,
                'files' => $image
            ]);

            $image = unserialize($image);
            $id = DB::getPdo()->lastInsertId(); 
            $lastpost = DB::table('house')->where('id', $id)->limit(1);

            foreach ($request->housingfile as $file) {
                Storage::disk('public')->putFileAs("housing/" . $id, $file, $file->getClientOriginalName());
            }
            $files = Storage::disk('public')->allFiles("housing/" . $id);
            
            foreach ($files as $filepath) {
                //dd($filepath, Storage::url($filepath));
                array_push($image, $filepath);
            }
            $image = serialize($image);
            $lastpost->update([
                'files' => $image
            ]);

        } else if ($room_title != NULL) {
            $roommates = $request->roommates;
            $preference = $request->preference;
            $description = $request->roommateDescription;
            $adress = $request->address;
            $roommatefile = $request->roommatefile;
            $image = serialize(array());
            DB::table('roommate')->insert([
                'id' => NULL,
                'title' => $room_title,
                'roommate_num' => $roommates,
                'roommate_gen' => $preference,
                'description' => $description,
                'user_id' => $user_id,
                'files' => $image

            ]);

            $image = unserialize($image);
            $id = DB::getPdo()->lastInsertId(); 
            $lastpost = DB::table('roommate')->where('id', $id)->limit(1);

            foreach ($request->roommatefile as $file) {
                Storage::disk('public')->putFileAs("roommate/" . $id, $file, $file->getClientOriginalName());
            }
            $files = Storage::disk('public')->allFiles("roommate/" . $id);
            
            foreach ($files as $filepath) {
                //dd($filepath, Storage::url($filepath));
                array_push($image, $filepath);
            }
            $image = serialize($image);
            $lastpost->update([
                'files' => $image
            ]);

        } else {
            $title = $request->generic_title;
            $con = $request->conditionGeneric;
            $sellOption = $request->sellOption;
            $description = $request->genericDescription;
            $adress = $request->address;
            $genericfile = $request->genericfile;
            $image = serialize(array());
            DB::table('everything')->insert([
                'id' => NULL,
                'title' => $title,
                'con' => $con,
                'description' => $description,
                'user_id' => $user_id,
                'files' => $image
            ]);
            
            $image = unserialize($image);
            $id = DB::getPdo()->lastInsertId(); 
            $lastpost = DB::table('everything')->where('id', $id)->limit(1);

            foreach ($request->genericfile as $file) {
                Storage::disk('public')->putFileAs("generic/" . $id, $file, $file->getClientOriginalName());
            }
            $files = Storage::disk('public')->allFiles("generic/" . $id);
            
            foreach ($files as $filepath) {
                //dd($filepath, Storage::url($filepath));
                array_push($image, $filepath);
            }
            $image = serialize($image);
            $lastpost->update([
                'files' => $image
            ]);

        }

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);

    }

    public function delete($type, $id)
    {
        // double check the userid
        $user = Auth::user();
        $user_id = $user->id;

        if ($type == "textbook") {
            $item = DB::table('textbook')->where('id', $id)->get();
            if ($item[0]->user_id == $user_id) {
                DB::table('textbook')->where('id', $id)->delete();
                Storage::disk('public')->deleteDirectory('textbook/' . $id);
                return Redirect::back()->with(['success' => 'You successfully delete a post!']);
            }

        } elseif ($type == "roommate") {
            $item = DB::table('roommate')->where('id', $id)->get();
            if ($item[0]->user_id == $user_id) {
                DB::table('roommate')->where('id', $id)->delete();
                Storage::disk('public')->deleteDirectory('roommate/' . $id);
                return Redirect::back()->with(['success' => 'You successfully delete a post!']);
            }

        } elseif ($type == "house") {

            $item = DB::table('house')->where('id', $id)->get();
            if ($item[0]->user_id == $user_id) {
                DB::table('house')->where('id', $id)->delete();
                Storage::disk('public')->deleteDirectory('housing/' . $id);
                return Redirect::back()->with(['success' => 'You successfully delete a post!']);
            }

        } elseif ($type == "general") {
            $item = DB::table('everything')->where('id', $id)->get();
            if ($item[0]->user_id == $user_id) {
                DB::table('everything')->where('id', $id)->delete();
                Storage::disk('public')->deleteDirectory('generic/' . $id);
                return Redirect::back()->with(['success' => 'You successfully delete a post!']);
            }

        }
        return Redirect::back()->withErrors('Fail to delete the post. Please try again later.');
    }

    //implement in the future
    public function edit($id)
    {

    }

}
