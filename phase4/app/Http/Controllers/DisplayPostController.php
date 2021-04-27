<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Collection\Collection;
use function Sodium\add;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class DisplayPostController
{


    public function index() {
	    $search = request()->query('search');
	    $type = request()->query('category');
	    $posts = collect();
	    if ($type == 'Books'){
            $posts = $this->textbookList();
	    } else if ($type == 'Housing'){
	        $posts = $this->houseList();
	    } else if ($type == 'Roommates'){
	        $posts = $this->roommateList();
	    } else if ($type == 'Others')	{
	        $posts = $this->otherList();
	    } else {
	        $textbook = $this->textbookList();
	        $house = $this->houseList();
	        $roommate = $this->roommateList();
	        $other = $this->otherList();
	        $posts = $textbook->merge($roommate)->merge($house)->merge($other)->sortByDesc('time');
        }
        //dd($posts);
        foreach($posts as $post){
            //dd($post);
            $post->files = unserialize($post->files);
        }
        
        //$image = unserialize($posts->files);
	    return view('main', [
            'posts' => $posts,
            //'image' => $image,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
        ]);

        
	    $posts = $this->generatePostList();
	    $detail = collect();
        return view('main', [
            'posts' => $posts,
            'detail' => $detail,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
        ]);
    }

    public function textbookList()
    {
	    $search = request()->query('search');

	    $posts = DB::table('textbook')->where('title','LIKE',"%{$search}%")
					->orWhere('con','LIKE',"%{$search}%")
					->orWhere('course','LIKE',"%{$search}%")
					->orWhere('course_num','LIKE',"%{$search}%")
					->orWhere('price','LIKE',"%{$search}%")
					->orWhere('description','LIKE',"%{$search}%")
					->get();
	    return $posts;
    }

    public function houseList()
    {
	    $search = request()->query('search');

	    $posts = DB::table('roommate')->where('title','LIKE',"%{$search}%")
					->orWhere('roommate_num','LIKE',"%{$search}%")
					->orWhere('roommate_gen','LIKE',"%{$search}%")
					->orWhere('description','LIKE',"%{$search}%")
					->get();
	    return $posts;
    }

    public function roommateList()
    {
	    $search = request()->query('search');

	    $posts = DB::table('house')->where('title','LIKE',"%{$search}%")
					->orWhere('house_type','LIKE',"%{$search}%")
					->orWhere('bathroom_num','LIKE',"%{$search}%")
					->orWhere('bedroom_num','LIKE',"%{$search}%")
					->orWhere('address','LIKE',"%{$search}%")
					->orWhere('description','LIKE',"%{$search}%")
					->get();
	    return $posts;
    }

    public function otherList()
    {
	    $search = request()->query('search');

	    $posts = DB::table('everything')->where('title','LIKE',"%{$search}%")
					->orWhere('con','LIKE',"%{$search}%")
					->orWhere('price','LIKE',"%{$search}%")
					->orWhere('description','LIKE',"%{$search}%")
					->get();
	    return $posts;
    }



    public function showPage()
    {
        $detail = collect();
        
        return view('detail', [
            'detail' => $detail,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
        ]);
    }

    public function showPageM()
    {

        $detail = collect();
        
        return view('detail-mobile', [
            'detail' => $detail,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
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
        $image = unserialize($detail[0]->files);
        return view('detail', [
            'detail' => $detail,
            'image' => $image,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
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

        $image = unserialize($detail[0]->files);
        return view('detail', [
            'detail' => $detail,
            'image' => $image,
            'url' => "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/"
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

        $url = "https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/storage/app/public/";
        $default = "https://www.buffalo.edu/content/www/campusliving/about-us/employment-opportunities/how-to-apply/_jcr_content/par/image.img.447.260.jpg/1507045432762.jpg";
        $textbooks = DB::table('textbook')->get();
/*
        $this->imagebytime = array();
        
        foreach ($textbooks as $tb) {            
            $files = Storage::disk('public')->allFiles("textbook/" . $tb->id);
            if(!empty($files)){
                $arr = [ $tb->time => $url . $files['0'] ];
                array_push($imagebytime, $arr);
            } else {
                $arr = [ $tb->time => $default ];
                array_push($imagebytime, $arr);
            }
        }
*/
        $roommates = DB::table('roommate')->get();
/*
        foreach ($textbooks as $tb) {            
            $files = Storage::disk('public')->allFiles("roommate/" . $tb->id);
            if(!empty($files)){
                $arr = [ $tb->time => $url . $files['0'] ];
                array_push($imagebytime, $arr);
            } else {
                $arr = [ $tb->time => $default ];
                array_push($imagebytime, $arr);
            }
        }
*/
        $houses = DB::table('house')->get();
/*
        foreach ($textbooks as $tb) {            
            $files = Storage::disk('public')->allFiles("housing/" . $tb->id);
            if(!empty($files)){
                $arr = [ $tb->time => $url . $files['0'] ];
                array_push($imagebytime, $arr);
            } else {
                $arr = [ $tb->time => $default ];
                array_push($imagebytime, $arr);
            }
        }
*/
        $general = DB::table('everything')->get();
/*
        foreach ($textbooks as $tb) {            
            $files = Storage::disk('public')->allFiles("generic/" . $tb->id);
            if(!empty($files)){
                $arr = [ $tb->time => $url . $files['0'] ];
                array_push($imagebytime, $arr);
            } else {
                $arr = [ $tb->time => $default ];
                array_push($imagebytime, $arr);
            }
        }
*/
        $posts = $textbooks->merge($roommates)->merge($houses)->merge($general)->sortByDesc('time');
        //dd($textbooks);
        return $posts;


    }

    public function back()
    {
        return Redirect::route('main');
    }

}
