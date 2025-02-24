<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = Hash::make($_POST['password']);

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $data = ['name' => $name, 'email' => $email];
        if (!empty($_POST['password'])) {
            $data['password'] = Hash::make($_POST['password']);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect('users');
    }
}

?>
