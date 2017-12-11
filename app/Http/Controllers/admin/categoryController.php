<?php

namespace App\Http\Controllers\admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class categoryController extends Controller
{
    public function index()
    {
        $category=Category::orderBy('cate_order')->get();
        return view('admin/category/category')->with('data',$category);
    }

    public function create(){
        $kinds= Category::all();
        return view('admin/category/add')->with('kinds',$kinds);
    }

    public function store()
    {
        $input=Input::all();
        if (!$input['cate_name']||$input['cate_name']==''){
            return back()->with('msg','分类名称不能为空');
        }
        if (!$input['cate_url']||$input['cate_name']==''){
            return back()->with('msg','分类路由不能为空');
        }
        $item=Category::create([
            'cate_name'=>$input['cate_name'],
            'cate_url'=> $input['cate_url'],
        ]);
        $item->update();
        return redirect('admin/category');
    }

    public function changeOrder()
    {
        $input= Input::all();
        $cate_id=$input['cate_id'];
        $data=Category::find($cate_id);
        $data['cate_order']=$input['value'];
        $result=$data->update();
        $arr=[];
        if ($result){
            $arr=[
                'status'=> 1,
                'msg' => '恭喜你，更新成功'
            ];
        }
        else{
            $arr=[
                'status'=> 0,
                'msg' => '更新失败.....'
            ];
        }
        return $arr;
    }
// | PUT|PATCH     | admin/category/{category}
    public function update($id)
    {
        $input=Input::except('_method');

        $result=Category::where('cate_id',$id)->update($input);
        if ($result){
            return redirect('admin/category');
        }else{
            return back()->with('error','更新操作失败，请稍后再试！');
        }
    }
//| GET|HEAD    | admin/category/{category}/edit
    public function edit($id)
    {
        $current= Category::where('cate_id',$id)->first();
         return view('admin\category\modify',compact('current'));
    }
//DELETE admin/category/{category}
    public function destroy($cate_id){
        $result=Category::where('cate_id',$cate_id)->delete();
        if ($result==1){
            $data=[
                "status" => $result,
                "msg"=> "删除成功！"
            ];
        }else{
            $data=[
                "status" => $result,
                "msg"=> "删除失败，请稍后再试！"
            ];
        }
        return $data;
    }
}
