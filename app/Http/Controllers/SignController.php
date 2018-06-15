<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkname(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|unique:users|min:2|max:16',
        ],[
            'name.required'=>'用户名未填写',
            'name.unique'=>'该用户名已经注册',
            'name.min'=>'用户名最小2个字符',
            'name.max'=>'用户名最大不超过16个字符',
        ]);
    }

    public function checkmail(Request $request)
    {
        $this->validate(request(),[
            'mail'=>'required|email|unique:users',
        ],[
            'mail.required'=>'邮箱未填写',
            'mail.email'=>'邮箱格式不正确',
            'mail.unique'=>'该邮箱已经注册',
        ]);
    }


    public function checkpassword(Request $request)
    {
        $this->validate(request(),[
            'password'=>'required|min:6|max:16',
        ],[
            'password.required'=>'密码未填写',
            'password.min'=>'密码不小于6个字符',
            'password.max'=>'密码不大于16个字符',
        ]);
    }

    public function store(Request $request)
    {
        $arr['password'] = bcrypt($request->password);
        $user = array_merge(request(['name','mail']),$arr);
        User::firstOrCreate($user);
        return back();
    }

    public function checkloginemail(Request $request)
    {
        $email = $request->loginemail;
        $user = User::where('mail',$email)->get();
        if($user->first()){
            echo '<span style="color:green">*该用户可登录</span>';
        }else{
            echo '*该用户不存在';
        }
    }

    public function login(Request $request)
    {
        $email = $request->loginemail;
        $password = $request->loginpassword;
        if(Auth::attempt(['mail'=>$email,'password'=>$password])){
            return redirect('/');
        }
        return back();
    }
}
