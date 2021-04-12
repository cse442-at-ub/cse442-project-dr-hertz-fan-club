<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayPostController
{
    public function index()
    {
        //$posts = DB::select('select * from textbook');
        $posts = DB::table('textbook')->get();

        return view('cards', [
            'posts' => $posts
        ]);
    }

    public function detail()
    {

    }

}
