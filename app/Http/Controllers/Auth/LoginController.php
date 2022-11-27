<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:web');
    }

    public function getLogin()
    {
        // lay danh muc cap 1
        $categoryLevel1 = \DB::table('categoryposts')->where('cpo_parent_id',0)->orderBy('cpo_sort','ASC')->get();
        \View::share('categoryLevel1', $categoryLevel1);
        return view('accounts.dang_nhap');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,$this->rule(),$this->messages());

        if (Auth::guard('web')->attempt(['u_email' => $request->u_email,'u_password' => $request->u_password], $request->remember))
        {
            return redirect()->intended(route('home'));
        }
        return redirect()->back()->withInput($request->only('u_email','u_password'));
    }
    /**
     * dieu kien dang nhap
     */
    public function rule()
    {
        return [
            'u_email'     =>  'required|email|max:255',
            'u_password'  =>  'required'
//            'u_password'  =>  'required|regex:/^[a-z0-9A-Z_-]{6,100}$/'
        ];
    }
    /**
     * custome message errors
     */
    public function messages()
    {
        return [
            'u_email.required'        =>  'Vui lòng nhập email',
            'u_email.email'           =>  'Email chưa xác nhận',
            'u_email.max'             =>  'Địa chỉ email quá dài',
            'u_password.required'     =>  'Vui lòng nhập mật khẩu',
            'u_password.regex'        =>  'Mật khẩu chứa ký tự đặc biệt'
        ];
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
