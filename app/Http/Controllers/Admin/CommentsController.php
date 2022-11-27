<?php

namespace App\Http\Controllers\Admin;

use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')->orderBy('id','DESC')->paginate(10);
        return view('admin.comments.index',compact('comments'));
    }

    public function delete(Request $request, $id)
    {
        $comment = Comments::findOrFail($id);
        $flagCheck = $comment->delete();
        if($flagCheck > 0)
        {
            return redirect()->route('comments.index')->with('success','Xoá thành công !!! ');
        }
        return redirect()->route('comments.index')->with('danger','Xoá thất bại !!! ');
    }
}
