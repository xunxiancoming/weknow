<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class indexController extends Controller
{
    /*
     * 文章首页
     */
    public function index()
    {
        if(Auth::check()){
            $contents = Content::orderBy('created_at','desc')->get();
            return view('index',compact('contents'));
        }else{
            return redirect('/sign');
        }
    }
    /*
     * 发表文章
     */
    public function publish()
    {
        return view('edit');
    }
    /*
     * 储存文章
     */
    public function store(Request $request)
    {
        $content = $request->content;
        $user_id = Auth::id();
        $content = Content::create(['user_id'=>$user_id,'content'=>$content]);
        if($content){
            return $msg = [
                'status'=>'ok',
                'url'=>'/',
                'msg'=>'发表成功'
                ];
            }else{
            return $msg = [
                'status'=>'error',
                'url'=>'/publish',
                'msg'=>'发表失败'
            ];
        }
    }
    
    /*
     * 文章评论列表
     */
    public function comment()
    {
        return view('comment');
    }
}
