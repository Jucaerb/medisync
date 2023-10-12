<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class Activities extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_patient',
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
        $patient = Patient::find($request->input('patient'));

        return Activities::Create([
            "id_patient" => $patient->id,
            "patient" => $patient->name,
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

    public static function indexActivities($request, $texto, $filter){
        return self;
    }
}
