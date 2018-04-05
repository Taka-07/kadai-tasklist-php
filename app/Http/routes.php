<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// トップページ
Route::get('/', function () {
    return view('welcome');
});

Route::resource("tasks", "TasksController");

// ユーザ登録　Routeで定義した@getRegisterがAuth\AuthControllerにあるgetRegisterアクションと繋がっている
//getRegister() アクションによって resources/views/auth/register.blade.php を表示
Route::get("signup", "Auth\AuthController@getRegister")->name("signup.get");
//$redirectToによってユーザ登録直後のリダイレクト先の指定やユーザ登録の際のバリデーションなど
//ユーザ登録のフォームを入力後ログインを自動で実行する
Route::post("signup", "Auth\AuthController@postRegister")->name("signup.post");

// ログイン認証
Route::get("login", "Auth\AuthController@getLogin")->name("login.get");
Route::post("login", "Auth\AuthController@postLogin")->name("login.post");
Route::get("logout", "Auth\AuthController@getLogout")->name("logout.get");