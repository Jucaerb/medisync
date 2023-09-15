<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->action('UsersController@index')->with('status', 'Usuario borrado correctamente');
    }

    protected function inactivateUser(request $request){
        User::inactivateUser(intval($request->id));

        $users = DB::table('users')->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    protected function activateUser(request $request){
        User::activateUser(intval($request->id));

        $users = DB::table('users')->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    protected function updatedUser(request $request){
       $user = User::find($request->id);

       return view('admin.edituser', [
           'user' => $user
       ]);
    }

    protected function saveEdit(Request $request){
        $user = User::find($request->user_id);
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->identification_number = $request->identification_number;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password == null){
            //
        } else {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $users = DB::table('users')->get();

        return view('admin.users',[
            'users' => $users
        ]);
    }
}
