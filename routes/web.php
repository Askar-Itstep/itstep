<?php

use Illuminate\Support\Facades\Route;

// Route::get('/main', function () {
//     // dump(request()->get('name'));    //http://127.0.0.1:8000/main?name=aibek&email=ai@mail.com
//     // dump(request()->all());
//     return view('welcome');
// });
// Route::get('/main/{name}/{email}', function ($name, $email) {
//     dump($name, $email);    //http://127.0.0.1:8000/main/name=aibek
// });


Route::get('/', function () {
    return view('welcome');
});
// //--------------------------------------------
// // Route::get('/users', function () {
// //     return view('user.index');
// // });
Route::view('/users', 'user.index');
// Route::get('/users/{name}', function ($name) {
//     // return view('user.index')->with('name', $name);
//     // return view('user.index',['name'=> $name]);
//     return view('user.index', compact('name'));
// });
// //-----------------------------------------------
Route::get('/users', 'UserController@index');
Route::get('/users{name}', 'UserController@run');

Route::get('/tasks', 'TaskController@index')->name('task.index');
Route::post('/tasks', 'TaskController@save')->name('task.store');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('task/edit/{id}', 'TaskController@edit')->name('task.edit');
Route::put('task/edit/{task}', 'TaskController@update')->name('task.update');   //1 table

// Route::delete('task', 'TaskController@delete')->name('task.delete');
Route::get('task/{id}', 'TaskController@delete')->name('task.delete');

Route::get('/tasks/{tag}', 'TaskController@searchByTag')->name('tasks.tag');
