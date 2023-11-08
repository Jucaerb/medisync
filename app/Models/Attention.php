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
        return Attention::updatedOrCreate(['id' => $request],[
            "status" => 'INACTIVE',
        ]);
    }

    public static function indexAttention($user_id, $texto) {
        return self::
            when((!empty($texto)), function ($cons) use ($texto){
                return $cons->where('activity_name', 'LIKE', '%'.$texto.'%')
                    ->orWhere('permissions', 'LIKE', '%'.$texto.'%');
        })
            ->when(($user_id != null), function ($query) use ($user_id){
                return $query->where('user_id', $user_id);
            })->orderBy('activity_name', 'asc')->paginate(8);
    }
}
