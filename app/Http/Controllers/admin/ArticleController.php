<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    public function upload()
    {
        $file = Input::file('Filedata');
        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $newName = date('Ymdhis') + random_int(100, 900) . '.' . $extension;
            $path = $file->move(base_path() . '/uploads', $newName);
            $filepath = 'uploads/' . $newName;
            return $filepath;
        } else {
            echo 'null';
        }
    }

    public function index()
    {
        $list = Article::paginate(5);
        return view('admin/article/list', compact('list'));
    }

    public function create()
    {
        $kinds = Category::all();
        return view('admin/article/add')->with('kinds', $kinds);
    }

    public function store()
    {
        $input = Input::all();
        if (!$input['art_pid']) {
            return back()->with('msg', '父级id为必填项.....');
        }
        $input['art_time'] = date('y-m-d h:m:s');
        $result = Article::create($input);
        if ($result) {
            //create success
            return redirect('admin/article');
        } else {
            //create failed
            return back()->with('msg', '添加失败，请稍后重试.....');
        }
    }

    public function edit($id)
    {
        $item = Article::where('art_id', $id)->first();
        $data = Category::all();
        return view('admin\article\edit', compact('item', 'data'));
    }

    public function update($id)
    {
        $input = Input::except('_method');
        $result = Article::where('art_id', $id)->update($input);
        if ($result) {
            return redirect('admin/article');
        } else {
            return back()->with('msg', '数据提交失败，请稍后重试....');
        }
    }

//DELETE admin/category/{category}
    public function destroy($art_id)
    {
        $result = Article::where('art_id', $art_id)->delete();
        if ($result) {
            return [
                "status" => 1,
                "msg" => '删除成功'
            ];
        } else {
            return [
                "status" => 0,
                "msg" => '删除失败'
            ];
        }
    }
}
