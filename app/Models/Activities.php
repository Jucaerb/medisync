<?php

namespace App\Models;

use Carbon\Carbon;
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
        'observations',
        'status'
    ];

    public static function createActivity($request){
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
            "create_date" => Carbon::create($request->input('create_date')),
            "suspension_date" => Carbon::create($request->input('suspension_date')),
            "observations" => $request->input('observations'),
            "status" => 'ACTIVE',
        ]);
    }

    public static function indexActivities($idPatient,$texto){
        return self::
        when((!empty($texto)), function ($cons) use ($texto){
            return  $cons->where('name_activity', 'LIKE', '%'.$texto.'%' )
            ->orWhere('min_permissions', 'LIKE', '%'.$texto.'%');
        })
        ->when(($idPatient != null), function ($query) use ($idPatient){
            return $query->where('id_patient', $idPatient);
        })->orderBy('name_activity', 'asc')->paginate(8);
    }
}
