<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Collection\Collection;
use function Sodium\add;

class DisplayPostController
{
    public function index()
    {

        $posts = $this->generatePostList();
        $detail = collect();
        //dd($posts);
        return view('main', [
            'posts' => $posts,
            'detail' => $detail
        ]);
    }

    public function showPage()
    {

        $detail = collect();
        //dd($posts);
        return view('detail', [
            'detail' => $detail
        ]);
    }

    public function showPageM()
    {

        $detail = collect();
        //dd($posts);
        return view('detail-mobile', [
            'detail' => $detail
        ]);
    }

    public function detail($type, $id)
    {
        if ($type == "textbook") {
            $detail = DB::table('textbook')->where('id', $id)->get();
        } elseif ($type == "roommate") {
            $detail = DB::table('roommate')->where('id', $id)->get();
        } elseif ($type == "house") {
            $detail = DB::table('house')->where('id', $id)->get();
        } else {
            $detail = DB::table('everything')->where('id', $id)->get();
//            $detail = collect($detail[0]);
//            $detail = $detail->put('general', 'ture')->toArray();
//            $detail = collect([$detail]);
        }
        //dd($detail);
        return view('detail', [
            'detail' => $detail
        ]);

    }

    public function mdetail($type, $id)
    {

        if ($type == "textbook") {
            $detail = DB::table('textbook')->where('id', $id)->get();
        } elseif ($type == "roommate") {
            $detail = DB::table('roommate')->where('id', $id)->get();
        } elseif ($type == "house") {
            $detail = DB::table('house')->where('id', $id)->get();
        } else {
            $detail = DB::table('everything')->where('id', $id)->get();
        }

        //dd($detail);
        return view('detail-mobile', [
            'detail' => $detail
        ]);


    }

    public function generatePostList()
    {
// in random order
//        $textbooks = DB::table('textbook')->inRandomOrder()->get();
//        $roommates = DB::table('roommate')->inRandomOrder()->get();
//        $houses = DB::table('house')->inRandomOrder()->get();
//        $general = DB::table('everything')->inRandomOrder()->get();
//        $posts = $textbooks->merge($roommates)->merge($houses)->merge($general);
//        $items = $posts->all();
//        shuffle($items);
//        $posts = \Illuminate\Support\Collection::make($items);

        $textbooks = DB::table('textbook')->get();
        $roommates = DB::table('roommate')->get();
        $houses = DB::table('house')->get();
        $general = DB::table('everything')->get();
        $posts = $textbooks->merge($roommates)->merge($houses)->merge($general)->sortByDesc('time');

        return $posts;


    }

    public function back()
    {
        return Redirect::route('main');
    }

}
