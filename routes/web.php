<?php

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

Route::get('tasks',function(){
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact(var_name:'tasks'));
});

Route::post('create',function(){
    $task_name = $_POST['name'];
    DB::table(table: 'tasks')->insert(['name'=> $task_name]);
    return redirect()->back();
});

Route::post('delete/{id}',function($id){
    DB::table('tasks')->where('id',$id)->delete();
    return redirect()->back();
});



