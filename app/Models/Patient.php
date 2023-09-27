<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'identification',
        'sex',
        'birth_date',
        'in_date',
        'room'
    ];

    public static function createPatient($request){
//        dd($request);
        return Patient::Create([
            "identification" => $request->input('identification'),
            "name" => $request->input('name'),
            "sex" => $request->input('sex'),
            "birth_date" => $request->input('birth_date'),
            "in_date" => $request->input('in_date'),
            "room" => $request->input('room'),
        ]);
    }

}
