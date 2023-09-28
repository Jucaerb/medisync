<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\CreatedUser;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

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
        try {
            User::createUser($request);
        }catch (\Exception $exception){
            return redirect(route('admin.registeruser'))->with('error', 'Ocurrió un error al crear el usuario');
        }
        $user = User::where('email', $request->input('email'))->first();

        $user->notify(new CreatedUser($user));

        return redirect(route('admin.registeruser'))->with('success', 'Usuario creado correctamente');
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
