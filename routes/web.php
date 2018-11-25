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

Route::get('/', function () {
    return view('welcome');
});

Route::get('base',function(){
	 return 'hello world kongshihao';
});

Route::get('member/info','Member@info');

Route::get('studys/info','Studys@info');
Route::get('studys/query','Studys@query');
Route::get('studys/request1','Studys@request1');
Route::get('session1','Studys@session1');
Route::get('session2',[
	'as'=>'session2',
	'uses' => 'Studys@session2']);
Route::get('response','Studys@response');
//宣传页面
Route::get('activity1',[
	'as'=>'activity1',
	'uses' => 'Studys@activity1']);
// 活动页面
Route::group(['middleware'=>['activity']],function(){
	Route::any('activity2', ['uses' => 'Studys@activity2'] );
	Route::any('activity3', ['uses' => 'Studys@activity3'] );
});


Route::group(['middleware1'=>['web']],function(){
	Route::get('student/index',['uses' => 'StudentController@index']);
	Route::get('student/create',['uses' => 'StudentController@create']);
	Route::any('student/save',['uses' => 'StudentController@save']);
	Route::any('student/update/{id}',['uses' => 'StudentController@update']);
	Route::any('student/details/{id}',['uses' => 'StudentController@details']);
	Route::any('student/delect/{id}',['uses' => 'StudentController@delect']);
});