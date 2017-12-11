<?php

namespace App\Http\Controllers\webApi;

use App\Model\Category;
use App\Model\Replay;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Psy\Util\Json;

class replayDataController extends Controller
{
    public function getList()
    {
        global $data;
        $data=[];
        $list=Category::all();
        $replay=Replay::where('parent_id',0)->orderBy('replay_order','desc')->paginate(5);
        $users=[];
        foreach ($replay as $item){
            $user=User::where('username',$item->sender)->first();
            array_push($users,$user);
            $this->getTree($item,array());
        }
        return view('pages/replay',compact('list','data','users','replay'));
    }

    public function getTree($elem,$arr)
    {
        array_push($arr,$elem);
        if ($elem->son_id==0){
            global $data;
            array_push($data,$arr);
            return;
        }
        else{
            $next=Replay::where('id',$elem->son_id)->first();
             $this->getTree($next,$arr);
        }
    }

    public function addReplay()
    {
        if (!session('user')){
            return [
                "status"=>0,
                'msg'=>"请先登录再留言..."
            ];
        }
        else{
            $input=Input::all();
            $input['sender']= session("user");
            $result= Replay::create($input);
            if ($result){
                return [
                    "status"=>1,
                    'msg'=>"留言成功..."
                ];
            }
            else{
                return [
                    "status"=>1,
                    'msg'=>"系统故障..."
                ];
            }
        }

    }

    public function deleteReplay()
    {
        $input=Input::all();
        $re=Replay::where('id',$input['id'])->first();
        if ($re['parent_id']!=0){
            $parent=Replay::where('son_id',$input['id'])->first();
            $parent['son_id']=0;
            $parentUpdate=$parent->update();
            if ($parentUpdate){
                $result= Replay::where('id',$input['id'])->delete();
                if($result){
                    return [
                        "status"=>1,
                        'msg'=>"删除成功..."
                    ];
                }
                return [
                    "status"=>1,
                    'msg'=>"删除失败，请稍候再试..."
                ];
            }
        }
        else{
            $result= Replay::where('id',$input['id'])->delete();
            if($result){
                return [
                    "status"=>1,
                    'msg'=>"删除成功..."
                ];
            }
            return [
                "status"=>1,
                'msg'=>"删除失败，请稍候再试..."
            ];
        }
    }

    public function addReplayToPerson()
    {
        $input=Input::all();
        $pid=$input['id'];
        $content=$input['content'];
        $replay_order=$input["replay_order"];
        $addResult=Replay::create([
            'parent_id'=> $pid,
            'son_id'=>0,
            'sender'=> session('user'),
            'content'=>$content,
            'time'=> $input['time'],
            'replay_order'=>$replay_order
        ]);
        if ($addResult){
            $replay=Replay::where('id',$pid)->first();

            $papa=Replay::where('parent_id',$pid)->first();
            $replay["son_id"]=$papa['id'];
            $replay->update();
            return [
                'status'=>1,
                'msg'=> '回复成功...'
            ];
        }
    }
}
