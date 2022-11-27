<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SlidesRequest;
use App\Slides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = DB::table('slides')->get();
        return view('admin.slides.index',compact('slides'));
    }
    public function getAdd()
    {
        return view('admin.slides.add');
    }

    public function createCategory(SlidesRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('images'))
        {
            $info = uploadImg('images');
            if($info['code'] == 1)
            {
                $data['images'] = $info['name'];
                move_uploaded_file($_FILES['images']['tmp_name'], public_path() . '/uploads/' . $info['name']);
            }
        }
        $check = DB::table('slides')->insert($data);
        if($check)
        {
            return redirect()->route('admin.slides.index')->with('success',' Thêm mới thành công !!! ');
        }
        return redirect()->route('admin.slides.index')->with('danger',' Thêm mới thất bại !!! ');

    }
    public function getEdit($id)
    {
        $slide = Slides::findOrFail($id);
        return view('admin.slides.update',compact('slide'));
    }
    public function postEdit($id)
    {

    }
    public function delete($id)
    {
        $slide = Slides::findOrFail($id);
        if(file_exists(public_path().'/uploads/'.$slide->images))
        {
            unlink(public_path().'/uploads/'.$slide->images);
        }
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success','Xoá thành công !!! ');

    }

}
