<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Emails;

class GmailAdminController extends Controller
{
    public function index( Request $request)
    {
        $finter = [];
        $listgmails = DB::table('email');
        if($request->e_email)
        {

            $listgmails->where("e_email","like","%".$request->e_email."%");
            $finter['e_email'] = $request->e_email;
        }
         // phan trang
        if($request->paginate)
        {
            $listgmails = $listgmails->paginate($request->paginate);
        }
        else
        {
            $listgmails = $listgmails->paginate(5);
        }
        $viewData = [
            'listgmails' => $listgmails,
            'finter'     => $finter
        ];
    	return view('admin.gmails.index',$viewData);
    }
    public function add()
    {
          return view('admin.gmails.add');
    }

    public function saveEmail(EmailRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $check = DB::table('email')->insert($data);
        if( $check )
        {
            return redirect()->route('admin.gmail.index')->with('success','Thêm mới thành công ');
        }
        return redirect()->route('admin.gmail.index')->with('danger','Thêm mới thất bại ');
    }
    public function getEdit($id)
    {
        $email = Emails::findOrFail($id);
        return view('admin.gmails.edit',compact('email'));
    }
    public function postEdit(Request $request,$id)
    {
        $data = $request->all();
       
        unset($data['_token']);

        $id = DB::table('email')->where('id',$id)->update($data);
        if($id > 0)
        {
            return redirect()->route('admin.gmail.index')->with('success',' Câp nhật thành công !!! ');
        }
        return redirect()->route('admin.gmail.index')->with('danger',' Câp nhật thất bại !!! ');
    }

    public function delete($id)
    {
        $email = Emails::findOrFail($id);
        $flagCheck = $email->delete();
        if($flagCheck > 0)
        {
            return redirect()->route('admin.gmail.index')->with('success','Xoá thành công !!! ');
        }
        return redirect()->route('admin.gmail.index')->with('danger','Xoá thất bại !!! ');
    }
    public function sendemail()
    {
        return view('admin.gmails.sendemail');
    }
}
