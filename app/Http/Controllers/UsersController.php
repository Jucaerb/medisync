<?php

namespace App\Http\Controllers;

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
        return view('admin.register');
    }

    protected function save(Resquest $request){
        $user = DB::table('users')->insert(array(
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'type_identification' => 'CC',
            'identification_number' => $request->input('identification_number'),
            'status' => "ACTIVE"
        ));

        return redirect()->action('UsersController@index')->with('status', 'Usuario creado correctamente');
    }

    protected function deleted($id){
        $user = DB::table('users')->where('id', $id)->delete();

        return redirect()->action('UsersController@index')->with('status', 'Usuario borrada correctamente');
    }
}
