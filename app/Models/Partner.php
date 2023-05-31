<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'ktp',
        'id_number',
        'phone_number',
        'birthplace',
        'birthday',
        'gender',
        'address',
        'citizenship',
        'status',
        'employment',
        'country',
    ];
}
