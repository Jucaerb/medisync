<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class Activities extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient',
        'name_activity',
        'min_permissions',
        'temporality',
        'schedule',
        'medicine_id',
        'dose',
        'via',
        'create_date',
        'suspension_date',
        'observations'
    ];

    public static function createActivity($request){
//        dd($request);
        return Activities::Create([
            "patient" => $request->input('patient'),
            "name_activity" => $request->input('name_activity'),
            "min_permissions" => $request->input('min_permissions'),
            "temporality" => $request->input('temporality'),
            "schedule" => $request->input('schedule'),
            "medicine_id" => $request->input('medicine_id'),
            "dose" => $request->input('dose'),
            "via" => $request->input('via'),
            "create_date" => $request->input('create_date'),
            "suspension_date" => $request->input('suspension_date'),
            "observations" => $request->input('observations')
        ]);
    }

}
