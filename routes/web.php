<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', function () {
    return view('index');
});

Route::get('/blog', function () {
    $list= \App\Model\Category::all();
    return view('pages/index',compact('list'));
});


Route::get('/api/user', function () {
    return session('user');
});
Route::get('/api/exit', function () {
    return session(['user'=>null]);
});

Route::get('about', function () {
    $list= \App\Model\Category::all();
    return view('pages/aboutMe',compact('list'));
});



Route::get('/api/codeUrl', 'webApi\apiController@codeURL');
Route::any('/api/login', 'webApi\apiController@login');
Route::any('/api/register', 'webApi\apiController@register');

Route::group(['middleware'=>['web','userLogin']],function (){

    Route::get('contact', function () {
        $list= \App\Model\Category::all();
        return view('pages/contactMe',compact('list'));
    });

    Route::get('/user/info','userController@info');
    Route::get('/user/userinformation','userController@index');
    Route::get('/user/userdetail','userController@detail');
    Route::get('/user/detailinfo','userController@userdetail');
    Route::post('/user/modifyInfo','userController@modifyInfo');
    Route::post('/user/modifyPass','userController@modifyPass');
    Route::post('/user/email','userController@email');
    //管理员后台
});

Route::group(['middleware'=>['web','adminLogin']],function (){
    Route::get('/admin/index','admin\adminController@index');
    Route::resource('/admin/category','admin\categoryController');
    Route::resource('/admin/article','admin\ArticleController');
    Route::post('admin/category/changeOrder','admin\categoryController@changeOrder');
    Route::post('/admin/upload','admin\ArticleController@upload');
});

Route::get('/replay','webApi\replayDataController@getList');
Route::post('/addReplay','webApi\replayDataController@addReplay');
Route::post('/replay/delete','webApi\replayDataController@deleteReplay');
Route::post('/replay/addReplay','webApi\replayDataController@addReplayToPerson');
