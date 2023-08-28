<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Http\Response;
use DB;


class postController extends Controller
{
   public function index(Request $request){
    $name = $request['postname'];

   $num = Posts::where('name',$name)
        ->get()->count();

        if($num==0){
            $post = new Posts;
            $post->name = $name;
            $str = $name;
            $delimiter = '-';
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
            $post->slug = $slug;
            $post->save();
        
            return view('index');
        }else{
            return "POST NAME ALREADY EXISTS!!";
        }
   }

   public function show(Request $request): Response
   {
    $post = Posts::all();
    return response()->view('sitemap',['slug'=>$post])->header('Content-Type', 'text/xml');;
   }

   public function viewpost($name){
    $slug = $name;
    
    $num = DB::table('posts')->where('slug','=',$slug)->get()->count();

    if($num == 1){
        return $id = Posts::select('id')->where('slug','=',$slug)->get();
        
    }
    else{
        return "SORRY THIS SLUGS RECORD DOES NOT EXIST ANYMORE!";
    }
    }

}
