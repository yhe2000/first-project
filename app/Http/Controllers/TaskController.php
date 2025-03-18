<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
   public function index(){
    //DB::table('tasks')->get();
    $tasks = Task::all();
    return view('tasks', compact(var_name:'tasks'));
   }

   public function create(){
    $task_name = $_POST['name'];
   // DB::table(table: 'tasks')->insert(['name'=> $task_name]);
    $task = new Task;
    $task->name = $task_name;
    $task->save();
    return redirect()->back();
   }

   public function destroy($id){
   // DB::table('tasks')->where('id',$id)->delete();
   $task = Task::findOrfail($id);
   $task->delete();
    return redirect()->back();
   }

   public function edit($id){
    //$task = DB::table('tasks')->where('id',$id)->first();
    //$tasks = DB::table('tasks')->get();
    $task = Task::findOrFail($id);
    $tasks = Task::all();
    return view('tasks',compact('task','tasks'));

   }

   public function update(Request $request){
    $id = $_POST['id'];
   // DB::table('tasks')->where('id','=',$id)->update(['name'=>$_POST['name']]);
   $task = Task::findOrFail($id);
   $task->name = $request->name;
   $task->save();
    return redirect('tasks');
   }
}
