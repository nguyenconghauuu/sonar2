<?php

namespace App\Http\Controllers\Frontend;

use App\CategoryPosts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorysController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showCategory(Request $request)
    {
        $idCate = (int)$request->id;
        $categoy = CategoryPosts::findOrFail($idCate);
        $categoryChildrens = CategoryPosts::where('cpo_parent_id',$idCate)->get();
        $viewData = [
            'CategoryChildrens' => $categoryChildrens,
            'category'          => $categoy
        ];

        return view('frontend.category',$viewData);
    }

    public function showCategoryCap2($slug, $id)
    {
        $categoy = CategoryPosts::findOrFail($id);

        $categoryParent = CategoryPosts::where('id',$categoy->cpo_parent_id)->first();

        $categoryChildrens = CategoryPosts::where('cpo_parent_id',$categoryParent->id)->get();

        $postsCategory =  \DB::table('posts')->where('po_category_post_id',$id)->orderBy('po_sort','ASC')->get();

        $viewData = [
            'categoryParent' => $categoryParent,
            'category'          => $categoy,
            'CategoryChildrens' => $categoryChildrens,
            'postsCategory'     => $postsCategory,
            'id_parent'         => $categoryParent->id
        ];
        return view('frontend.about_category',$viewData);
    }
}
