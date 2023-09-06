<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    protected function index() {
        return view('admin.home');
    }

    protected function user() {
        $users = DB::table('users')->get();

        return view('admin.users',[
            'users' => $users
        ]);
    }

    protected function create(){
        return view('admin.registeruser');
    }

    protected function save(Request $request){
//        User::createUser($request);
        $user = DB::table('users')->insert(array(
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'type_identification' => 'CC',
            'identification_number' => $request->input('identification_number'),
            'role' => $request->input('role'),
            'status' => "ACTIVE"
        ));

        return redirect(route('admin.registeruser'))->with('status', 'Usuario creado correctamente');
    }

    protected function deleted($id){
        $user = DB::table('users')->where('id', $id)->delete();

        return redirect()->action('UsersController@index')->with('status', 'Usuario borrada correctamente');
    }
}
