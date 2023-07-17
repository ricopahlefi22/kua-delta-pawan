<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'pasangan';

    protected $fillable = [
        'user_id',
        'wedding_id',
        'photo',
        'ktp',
        'name',
        'id_number',
        'phone_number',
        'birthplace',
        'birthday',
        'gender',
        'address',
        'citizenship',
        'status',
        'parent_status',
        'employment',
        'country',
    ];
}
