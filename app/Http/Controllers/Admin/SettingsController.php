<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function getInfo()
    {
    	$settings = DB::table('settings')->first();
    	return view('admin.settings.index',compact('settings'));
    }

    /**
     * @param SettingsRequest $request
     */
    public function saveInfo(SettingsRequest $request )
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('logo'))
        {
            $info = uploadImg('logo');
            if($info['code'] == 1)
            {
                $data['logo'] = $info['name'];
                move_uploaded_file($_FILES['logo']['tmp_name'], public_path() . '/uploads/' . $info['name']);
            }
        }
        $check = DB::table('settings')->where('id',1)->update($data);
        if( $check )
        {
            return redirect()->route('admin.settings.index')->with('success','Cập nhật thành công ');
        }
        return redirect()->route('admin.settings.index');
    }
}
