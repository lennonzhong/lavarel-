<?php

namespace App\Http\Controllers\webApi;
require ('./resources/views/org/code/Code.class.php');
use App\Model\User;
use App\Model\userDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class apiController extends Controller
{
    public function codeURL()
    {
        $code= new \Code();
        $url=$code->make();
        return $url;
    }

    public function getCode()
    {
        $code= new \Code();
        $codeNumber=$code->get();
        return $codeNumber;
    }

    public function login()
    {
        $input=Input::all();
        $users=User::where('username',$input['username'])->get();
        if ($users->first()){
            $user= $users->first();
            if ($user['password']==$input['password']){
                $passStatus=true;
            }else{
                return [
                    'status' =>0,
                    'msg'=>'密码错误...'
                ];
            }
            if (strtoupper($input['code'])==$this->getCode()){
                $codeStatus=true;
            }else{
                return [
                    'status' =>0,
                    'msg'=>'验证码出错...'
                ];
            }

            if ($passStatus&&$codeStatus){
                session(['user'=>$input['username']]);
                return [
                    'status' =>1,
                    'msg'=> session('user')
                ];
            }

        }else{
            return [
                'status' =>0,
                'msg'=>'该用户不存在...'
            ];
        }
    }

    public function register()
    {
        $input=Input::all();

        $repeat=User::where('username',$input['username'])->get();
        if ($repeat->first()){
            return [
                'status' =>0,
                'msg'=>'用户名已占用...'
            ];
        }
        $user= User::create([
            'username'=>$input['username'],
            'password'=>$input['password'],
        ]);
        $result=$user->update();
        $userDetail=userDetail::create([
            'user_name'=>$input['username'],
        ]);
        $detailResult = $userDetail->update();
        if ($result&&$detailResult){
            session(['user'=>$input['username']]);
            return [
                'status' =>1,
                'msg'=>session('user')
            ];
        }else{
            return [
                'status' =>0,
                'msg'=>'注册失败，请稍后再试...'
            ];
        }
    }
}
