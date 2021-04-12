<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Textbook;
use App\Models\House;
use App\Models\Roommate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(){
        return view('post');
    }

    public function store(Request $request){

	$user = Auth::user();
	$user_id = $user->id;
        $name = $request->textbook_name;
	$house_title = $request->house_title;
	$room_title = $request->roommate_title;
	$title = $request->generic_title;
if($name != NULL){
        $textbook_con = $request->textbook_condition;
        $course = $request->course;
        $course_num =  $request->course_num;
        $description =  $request->textbookDescription;
	DB::table('textbook')->insert([
    	'textbook_id' => NULL,
    	'name' => $name,
	'textbook_condition' => $textbook_con,
	'course' => $course,
	'course_num' => $course_num,
	'description' => $description,
	'user_id' => $user_id
	]);        
}else if($house_title !=NULL)
{
        $type = $request->housingType;
        $bedrooms = $request->bedrooms;
        $bathrooms=  $request->bathrooms;
        $description =  $request->housingDescription;
	$adress = $request->address;
	DB::table('house')->insert([
    	'house_id' => NULL,
    	'title' => $house_title,
	'house_type' => $type,
	'bedroom_num' => $bedrooms,
	'bathroom_num' => $bathrooms,
	'description' => $description,
	'address' => $adress,
	'user_id' => $user_id
	]); 

}else if($room_title !=NULL)
{
        $roommates = $request->roommates;
        $preference =  $request->preference;
        $description =  $request->roommateDescription;
	$adress = $request->address;
	DB::table('roommate')->insert([
    	'roommate_id' => NULL,
    	'title' => $room_title,
	'roommate_num' => $roommates,
	'roommate_gen' => $preference,
	'description' => $description,
	'user_id' => $user_id
	]); 

}else
{
	$title = $request->generic_title;
        $con = $request->conditionGeneric;
        $sellOption=  $request->sellOption;
        $description =  $request->genericDescription;
	$adress = $request->address;
	DB::table('everything')->insert([
    	'id' => NULL,
    	'title' => $title,
	'con' => $con,
	'description' => $description,
	'user_id' => $user_id
	]); 

	
}

            return redirect()->route('main')->with(['success' => 'You successfully Posted!']);

    }
}
