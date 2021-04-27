<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $textbook = DB::table('textbook')->where('user_id', $user_id)->get();
        $roommate = DB::table('roommate')->where('user_id', $user_id)->get();
        $house = DB::table('house')->where('user_id', $user_id)->get();
        $everything = DB::table('everything')->where('user_id', $user_id)->get();
        //dd($user_posts);

//        $tb_posts = collect();
//
//        foreach ($user_posts as $posts) {
//            //if type id is 1, check textbook table
//            if ($posts->type_id == 1) {
//                $tb_posts = DB::table('textbook')->where('textbook_id', $posts->post_id)->get();
//            }
//
//        }
        foreach($textbook as $post){
            $post->files = unserialize($post->files);
        }
        foreach($roommate as $post){
            $post->files = unserialize($post->files);
        }
        foreach($house as $post){
            $post->files = unserialize($post->files);
        }
        foreach($everything as $post){
            $post->files = unserialize($post->files);
        }

        return view('profile', [
            'textbooks' => $textbook,
            'roommates' => $roommate,
            'houses' => $house,
            'everything' => $everything,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
        ]);
    }


}
