<?php

namespace App\Http\Controllers\Site;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Video;
use App\Discount;
use DB;
use App\Libs\pay;


class SiteController extends Controller
{
    public function index()
    {

        $menu = Category::with('getChild')->where('parent_id',0)->get();
        $lastbook = Book::latest()->orderBy('id','DESC')->limit(4)->get();
        $lastvideo = Video::latest()->orderBy('id','DESC')->limit(4)->get();
        $discount = Discount::get();
        return view('site.index',compact('menu','lastbook','lastvideo','discount'));

    }
   
   public function menu($menu1)
   {  
     $menu2 = Category::find($menu1); 
     $menu = Category::with('getChild')->where('parent_id',0)->get();
     $cat = Category::where('id',$menu1)->first();
     if($cat)
        {
     $book = DB::table('book_category')->where('category_id',$cat->id)->orderBy('book_id','desc')->get();
     
     $array = array();
     foreach ($book as $key => $value) 
     {
         $array[$key] = $value->book_id;
     }

     $books = Book::orderBy('id','ASC')->whereIn('id',$array)->get();
     
     $video = DB::table('category_video')->where('category_id',$cat->id)->orderBy('video_id','desc')->get();
     
            $array = array();
            foreach ($video as $key => $value) 
            {
                 $array[$key] = $value->video_id;
            }

     $videos = Video::orderBy('id','ASC')->whereIn('id',$array)->get();
     
     return view ('site.menu',compact('books','videos','menu','menu2'));
     
      }
    else{
        return abort('404');
    }
   }

   public function submenu($menu1,$submenu)
   {
     $menu2 = Category::find($submenu); 
     $menu = Category::with('getChild')->where('parent_id',0)->get();
     $cat = Category::where('id',$menu1)->first();
     if($cat)
     {
         $cat1 = Category::where('id',$submenu)->first();
         if($cat1 && $cat1->parent_id==$cat->id)
         {
            $category = Category::where('parent_id',0)->get();
            $book = DB::table('book_category')->where('category_id',$cat->id)->orderBy('book_id','desc')->get();
     
            $array = array();
            foreach ($book as $key => $value) 
            {
                 $array[$key] = $value->book_id;
            }

            $books = Book::orderBy('id','ASC')->whereIn('id',$array)->get();
     
            $video = DB::table('category_video')->where('category_id',$cat->id)->orderBy('video_id','desc')->get();
     
            $array = array();
            foreach ($video as $key => $value) 
            {
                 $array[$key] = $value->video_id;
            }

            $videos = Video::orderBy('id','ASC')->whereIn('id',$array)->get();
     
            return view ('site.submenu',compact('books','videos','menu','menu2'));
            
            
         }
         else{
            return abort('404');
            }
            
     }
     else{
            return abort('404');
            } 
   }
   
   public function singleBook($slug)
   {
       $menu = Category::with('getChild')->where('parent_id',0)->get();
       $book = Book::whereSlug($slug)->get();
       $discount = Discount::get();
       return view ('site.book.single',compact('book','menu','discount'));
   }
   
   public function singleVideo($slug)
   {
       $menu = Category::with('getChild')->where('parent_id',0)->get();
       $video = Video::whereSlug($slug)->get();
       $discount = Discount::get();
       return view ('site.video.single',compact('video','menu','discount'));
   }

   public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

     public function pay()
     {
         $api = "1fd332275376d6e2a0d18c482c9e699b";
         $amount = 1000;
         $redirect = "http://localhost:8000/pay";
         $result = pay::send($api,$amount,$redirect);
         $result = json_decode($result);
        if($result->status) {
            $go = "https://pay.ir/pg/$result->token";
           return $redirect($go);
        } else {
            echo $result->errorMessage;
        }
                
     }

    public function verify()
    {
        $api = "1fd332275376d6e2a0d18c482c9e699b";
        $token = $_GET['token'];
        $result = json_decode(verify($api,$token));
        if(isset($result->status)){
            if($result->status == 1){
                echo "<h1>تراکنش با موفقیت انجام شد</h1>";
            } else {
                echo "<h1>تراکنش با خطا مواجه شد</h1>";
            }
        } else {
            if($_GET['status'] == 0){
                echo "<h1>تراکنش با خطا مواجه شد</h1>";
            }
        }
    }

    
       

}
