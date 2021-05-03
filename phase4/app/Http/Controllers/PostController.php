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

    public function storeTextbook(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        //validation
        $request->validate([
            'textbook_title' => 'required|string|max:50',
            'textbook_condition' => 'required',
            'course' => 'required',
            'course_num' => 'required|numeric|regex:/[0-9]{3}/',
            'bookPrice' => 'required|numeric|regex:/[0-9]/',
            'textbookDescription' => 'required|string|max:255',
            'textbookfile' => 'required',
        ]);

        foreach ($request->textbookfile as $file) {
            if(!$file->isValid()){
                $request->validate([
                    'textbookfile' => 'required|file'
                ]);
            }
        }

        $user = Auth::user();
        $user_id = $user->id;
        $textbook_title = $request->textbook_title;
        $textbook_con = $request->textbook_condition;
        $course = $request->course;
        $course_num = $request->course_num;
        $price = $request->bookPrice;
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
        
        $id = DB::getPdo()->lastInsertId();

        $this->Uploadfiles('textbook', $id, $textbookfile);

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);


    }

    public function storeHouse(Request $request)
    {

        $request->validate([
            'house_title' => 'required|string|max:50',
            'housingType' => 'required',
            //'rentPrice' => 'required|numeric|regex:/[0-9]/',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'housingDescription' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'housingfile' => 'required',
        ]);

        foreach ($request->housingfile as $file) {
            if(!$file->isValid()){
                $request->validate([
                    'housingfile' => 'required|file'
                ]);
            }
        }

        $user = Auth::user();
        $user_id = $user->id;
        $house_title = $request->house_title;
        $type = $request->housingType;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $rentPrice = $request->rentPrice;
        $description = $request->housingDescription;
        $address = $request->address;
        $housefile = $request->housingfile;
        $image = serialize(array());
        //$rentPrice = $request->rentPrice;
        DB::table('house')->insert([
            'title' => $house_title,
            'house_type' => $type,
            'bedroom_num' => $bedrooms,
            'bathroom_num' => $bathrooms,
            'price' => $rentPrice,
            'description' => $description,
            'address' => $address,
            'user_id' => $user_id,
            'files' => $image,
        ]);

        $id = DB::getPdo()->lastInsertId();

        $this->Uploadfiles('house', $id, $housefile);

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);
    }

    public function storeRoommate(Request $request)
    {
        
        $request->validate([
            'roommate_title' => 'required|string|max:50',
            'roommates' => 'required|numeric',
            'preference' => 'required',
            'roommateDescription' => 'required|string|max:255',
            'roommatefile' => 'required',
        ]);

        foreach ($request->roommatefile as $file) {
            if(!$file->isValid()){
                $request->validate([
                    'roommatefile' => 'required|file'
                ]);
            }
        }

        $user = Auth::user();
        $user_id = $user->id;
        $room_title = $request->roommate_title;
        $roommates = $request->roommates;
        $preference = $request->preference;
        $description = $request->roommateDescription;
        $roommatefile = $request->roommatefile;
        $image = serialize(array());
        DB::table('roommate')->insert([
            'title' => $room_title,
            'roommate_num' => $roommates,
            'roommate_gen' => $preference,
            'description' => $description,
            'user_id' => $user_id,
            'files' => $image

        ]);

        $id = DB::getPdo()->lastInsertId();

        $this->Uploadfiles('roommate', $id, $roommatefile);

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);



    }

    public function storeEverything(Request $request)
    {


        $request->validate([
            'generic_title' => 'required|string|max:50',
            'conditionGeneric' => 'required',
            //'itemPrice' => 'required|numeric|regex:/[0-9]/',
            'genericDescription' => 'required|string|max:255',
            'genericfile' => 'required',
        ]);

        foreach ($request->genericfile as $file) {
            if(!$file->isValid()){
                $request->validate([
                    'genericfile' => 'required|file'
                ]);
            }
        }

        $user = Auth::user();
        $user_id = $user->id;
        $title = $request->generic_title;
        $con = $request->conditionGeneric;
        $description = $request->genericDescription;
        $genericfile = $request->genericfile;
        $itemPrice = $request->itemPrice;
        $image = serialize(array());
        //$itemPrice = $request->itemPrice;
        DB::table('everything')->insert([
            'id' => NULL,
            'title' => $title,
            'con' => $con,
            'description' => $description,
            'user_id' => $user_id,
            'files' => $image,
            'price' => $itemPrice
        ]);
        
        $id = DB::getPdo()->lastInsertId();

        $this->Uploadfiles('everything', $id, $genericfile);

        return redirect()->route('main')->with(['success' => 'You have successfully Posted!']);

    }

    /* idk how to call this and get it to run properly */
    public function getInvalidFiles($files)
    {
        // Checks if any files have any errors
        $badfiles = "";
        $error = false;
        foreach ($files as $index=>$file) {
            if(!$file->isValid()){
                $badfiles = " " . $badfiles . $file->getClientOriginalName();
                $error = true;
            }
        }
        if($error){
            return redirect()->route('post')->with(['danger' => 'These files cannot be uploaded:' . $badfiles ]);
        }
    }

    public function Uploadfiles($type, $id, $files)
    {
        $image = array();
        //dd($type, $id, $files);
        $lastpost = DB::table($type)->where('id', $id)->limit(1);
        //dd($lastpost);
        foreach ($files as $file) {
            Storage::disk('public')->putFileAs($type . "/" . $id, $file, $file->getClientOriginalName());
        }
        $files = Storage::disk('public')->allFiles($type . "/" . $id);
        
        foreach ($files as $filepath) {
            array_push($image, $filepath);
        }

        $image = serialize($image);
        //dd($image);
        $lastpost->update([
            'files' => $image
        ]);
    }

    public function delete($type, $id)
    {
        // double check the userid
        $user = Auth::user();
        $user_id = $user->id;
        Storage::disk('public')->deleteDirectory($type . '/' . $id);
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
    public function edit(Request $request, $type, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        
        if ($type == "textbook") {
                $textbook_title = $request->textbook_title;
                $textbook_con = $request->textbook_condition;
                $course = $request->course;
                $course_num = $request->course_num;
                $price = $request->price;
                $description = $request->textbookDescription;
                $textbookfile = $request->textbookfile;
                DB::table('textbook')->where('id', $id)->update([
                    'title' => $textbook_title,
                    'con' => $textbook_con,
                    'course' => $course,
                    'course_num' => $course_num,
                    'price' => $price,
                    'description' => $description,
                    'user_id' => $user_id,
                ]);
                $image = serialize(array());
    		    if($textbookfile != NULL){ 
                    
                    $image = unserialize($image);

                    foreach ($request->textbookfile as $file) {
                        Storage::disk('public')->putFileAs("textbook/" . $id, $file, $file->getClientOriginalName());
                    }
                    $files = Storage::disk('public')->allFiles("textbook/" . $id);
                
                    foreach ($files as $filepath) {
                        array_push($image, $filepath);
                    }
                    $image = serialize($image);
                    DB::table('textbook')->where('id', $id)->update([
                        'files' => $image
                        ]);

                }

        return redirect()->route('profile')->with(['success' => 'You have successfully Edited Post!']);


        } else if ($type == "house") {
            $house_title = $request->house_title;
            $type = $request->housingType;
            $bedrooms = $request->bedrooms;
            $bathrooms = $request->bathrooms;
            $description = $request->housingDescription;
            $address = $request->address;
            $housingfile = $request->housingfile;
            $rentPrice = $request->rentPrice;
            $image = serialize(array());
            DB::table('house')->where('id', $id)->update([
                'title' => $house_title,
                'house_type' => $type,
                'bedroom_num' => $bedrooms,
                'bathroom_num' => $bathrooms,
                'price' => $rentPrice,
                'description' => $description,
                'address' => $address,
                'user_id' => $user_id,
            ]);
            if($housingfile != NULL){
                $image = unserialize($image);

                foreach ($request->housingfile as $file) {
                    Storage::disk('public')->putFileAs("house/" . $id, $file, $file->getClientOriginalName());
                }
                $files = Storage::disk('public')->allFiles("house/" . $id);
            
                foreach ($files as $filepath) {
                    array_push($image, $filepath);
                }
                $image = serialize($image);
                DB::table('house')->where('id', $id)->update([
                    'files' => $image
                ]);
                }
            return redirect()->route('profile')->with(['success' => 'You have successfully Edited Post!']);

        } else if ($type == "roommate") {
            $room_title = $request->roommate_title;
            $roommates = $request->roommates;
            $preference = $request->preference;
            $description = $request->roommateDescription;
            $adress = $request->address;
            $roommatefile = $request->roommatefile;
            $image = serialize(array());
            DB::table('roommate')->where('id', $id)->update([
                'title' => $room_title,
                'roommate_num' => $roommates,
                'roommate_gen' => $preference,
                'description' => $description,
                'user_id' => $user_id,

            ]);
            if($roommatefile != NULL){
                $image = unserialize($image);
                foreach ($request->roommatefile as $file) {
                    Storage::disk('public')->putFileAs("roommate/" . $id, $file, $file->getClientOriginalName());
                }
                $files = Storage::disk('public')->allFiles("roommate/" . $id);
                
                foreach ($files as $filepath) {
                    array_push($image, $filepath);
                }
                $image = serialize($image);
                DB::table('roommate')->where('id', $id)->update([
                    'files' => $image
                ]);

            }
            return redirect()->route('profile')->with(['success' => 'You have successfully Edited Post!']);

        } else if($type == "everything") 
        {

            $title = $request->generic_title;
            $con = $request->conditionGeneric;
            $itemPrice = $request->itemPrice;
            $description = $request->genericDescription;
            $genericfile = $request->genericfile;
            $image = serialize(array());
            DB::table('everything')->where('id', $id)->update([
                'title' => $title,
                'con' => $con,
                'price' => $itemPrice,
                'description' => $description,
            ]);
            if($genericfile != NULL)
            {
                    $image = unserialize($image);
                foreach ($request->genericfile as $file) {
                    Storage::disk('public')->putFileAs("generic/" . $id, $file, $file->getClientOriginalName());
                }
                $files = Storage::disk('public')->allFiles("generic/" . $id);
                
                foreach ($files as $filepath) {
                    array_push($image, $filepath);
                }
                $image = serialize($image);
                DB::table('everything')->where('id', $id)->update([
                    'files' => $image
                ]);
            }   
                return redirect()->route('profile')->with(['success' => 'You have successfully Edited Post!']);
        }else{
            return redirect()->route('profile')->withErrors('Fail to delete the post. Please try again later.');

        }
    }



}
