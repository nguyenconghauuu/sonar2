<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CategoryPosts;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cateModel = new CategoryPosts();
        $categorys = DB::table('categoryposts')->where('cpo_parent_id',1)->get();
//        dd($categorys);
        $sortCategory = array();
        // gọi hàm đệ quy sắp xếp lai danh mục theo thứ tự
        $cateModel->recursive($categorys, $parent = 0 , $level = 1, $sortCategory);


        // bài viết mới | dang hien thi 10 || sua thi take(5)
        $postNew = DB::table('posts')->take(10)->orderBy('id','DESC')->get();

        // lay ra bai viet noi bat
        $postHot = DB::table('posts')->where('po_hot',1)
            ->take(10)->get();

        // bai viet lien quan
        $postAbout = DB::table('posts_about')->take(10)->orderBy('id','DESC')->get();
        return view('frontend.home',compact('sortCategory','postNew','postHot','postAbout','categorys'));
    }

    public function searchTypehead(Request $request)
    {
        $posts = DB::table('posts')->select('id','po_title','po_slug');
        $query = $request->input('query');
        if($query)
        {
            $posts = $posts->where("po_title","LIKE","%{$query}%")->limit(10)->orderBy('id','DESC')->get();
        }else
        {
            $posts = $posts->limit(10)->orderBy('id','DESC')->get();
        }
        return response()->json($posts);
    }
}
