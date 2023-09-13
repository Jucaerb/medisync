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
        User::createUser($request);

        return redirect(route('admin.registeruser'))->with('status', 'Usuario creado correctamente');
    }

    protected function deleted($id){
        $user = DB::table('users')->where('id', $id)->delete();

        return redirect()->action('UsersController@index')->with('status', 'Usuario borrada correctamente');
    }

    protected function updateStatus($id){
        $users = DB::table('users')->where('id', $id)->first();

        return view('admin.status', [
            'users' => $users
        ]);
    }

    protected function updatedUser(request $request){
       User::updatedUsers($request);

        return redirect(route('admin.edituser'))->with('status', 'Usuario actualizado correctamente');
    }
}
