<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
