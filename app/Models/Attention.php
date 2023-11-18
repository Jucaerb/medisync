<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\text;

class Attention extends Model
{
    use HasFactory;

    protected $table = 'attention';

    protected $fillable = [
        'activity',
        'activity_name',
        'user_id',
        'hour',
        'date_for',
        'comments',
        'permissions',
        'status'
    ];

    public static function attetionPatient($request) {
        return Attention::updateOrCreate(['id' => $request->id],[
            "comments" => $request->comments,
            "status" => 'INACTIVE',
        ]);
    }

    public static function indexAttention($user_id, $texto) {
        return self::
            when((!empty($texto)), function ($cons) use ($texto){
                return $cons->where('activity_name', 'LIKE', '%'.$texto.'%')
                    ->orWhere('permissions', 'LIKE', '%'.$texto.'%')
                    ->where('attention.status', 'ACTIVE')->select('attention.id', 'activities.min_permissions', 'attention.activity_name', 'attention.user_id',
                        'activities.medicine_id', 'activities.via', 'activities.dose', 'attention.hour', 'patients.name', 'patients.room',
                        'activities.observations', 'attention.date_for');
        })
            ->when(($user_id != null), function ($query) use ($user_id){
                return $query->where('user_id', $user_id);
            })->join('activities', 'attention.user_id', '=', 'activities.id_patient')
            ->join('patients', 'attention.user_id', '=', 'patients.id')
            ->where('attention.status', 'ACTIVE')->select('attention.id', 'activities.min_permissions', 'attention.activity_name', 'attention.user_id',
                'activities.medicine_id', 'activities.via', 'activities.dose', 'attention.hour', 'patients.name', 'patients.room',
                'activities.observations', 'attention.date_for')->orderBy('date_for', 'asc')->paginate(8);
    }
}
