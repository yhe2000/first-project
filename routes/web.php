<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\table;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Yara';
    $departments = [
        '1 ' => 'Tichnical',
        '2' => 'Financial',
        '3'=> 'Sales',
    ];

    //  return view('about' ,['name' =>$name ]);
  //  return view('about')->with('name',value:$name);
  return view('about' , compact(var_name:'name' , var_names:'departments'));

});

Route::post('/about' , function(Request $request){
    $name = $request->input('name');
    $departments = [
        '1 ' => 'Tichnical',
        '2' => 'Financial',
        '3'=> 'Sales',

    ];
    return view('about', ['name' => $name , 'departments'=>$departments]);
});

Route::get('tasks',[TaskController::class,'index']);

Route::post('create',[TaskController::class,'create']);

Route::post('delete/{id}',[TaskController::class,'destroy']);

Route::post('edit/{id}',[TaskController::class,'edit']);

Route::post('update',[TaskController::class,'update']);

Route::get('app',function(){
    return view('layouts.app');
});
Route::get('users', [UserController::class, 'index']);

Route::post('create-user', [UserController::class, 'create']);

Route::post('delete-user/{id}', [UserController::class, 'destroy']);

Route::get('edit-user/{id}', [UserController::class, 'edit']);

Route::post('update-user', [UserController::class, 'update']);



