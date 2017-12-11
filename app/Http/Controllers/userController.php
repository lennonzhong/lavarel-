<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\userDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{

    public function index()
    {
        return view('pages/userInfo');
    }

    public function info()
    {
        if (session('user')){
            return [
                "statusCode"=> 'ok',
                'url'=> '/graduateDesign/user/userinformation'
            ];
        }
    }

    public function detail()
    {
        $user= session('user');
        $item= User::where('username',$user)->first();
        if ($item['role']===0){
            return $data=[
                'type'=>'一般会员',
                'username'=> $user
            ];
        }
        else{
            return $data=[
                'type'=>'管理员',
                'username'=> $user
            ];
        }
    }

    public function userdetail()
    {
        $users= userDetail::where('user_name',session('user'))->first();
        return $users;
    }

    public function modifyInfo()
    {
        $input= Input::all();
        $result= userDetail::where('user_name',session('user'))->update($input);
        if ($result==1){
            return [
                    'statusCode'=> 1,
                    'msg'=> '修改信息成功...'
                ];
        }else{
            return [
                'statusCode'=> 0,
                'msg'=> '修改信息失败，请稍后重试...'
            ];
        }
    }

    public function modifyPass()
    {
        $input = Input::all();
        $user = User::where('username',session('user'))->first();

        if ($input['newpassword'] != $input['repeatpassword']) {
            return ['msg'=>'新密码与重复密码不匹配！'];
        }

        if ($input['oldpassword'] != $user['password']) {
            return ['msg'=> '原密码不正确！'];
        }
        else if ($input['oldpassword'] == $user['password']) {
            $user['password'] = $input['newpassword'];
            $user->save();
            return ['msg' => '密码修改成功！'];
        }
    }

    public function email()
    {
        $input= Input::all();
        $name = $input['from'];
        $msg= '这是我的邮箱'.$input['email'].'     '.$input['subject'].'    '.$input['msg'];
        Mail::send('test',['name'=>$name,'email'=>$input['email'],'subject'=>$input['subject'],'msg'=>$input['msg']],function($message){
            $to = '1062439664@qq.com';
            $message ->to($to)->subject('博客来信');
        });
        return '邮件已发送...请耐心等候回复..';
    }
}
