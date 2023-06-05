<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $table = 'pernikahan';

    protected $dates = ['date'];

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'married_on_office',
        'married_address',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function partner(){
        return $this->hasOne(Partner::class, 'wedding_id');
    }

    public function requirement(){
        return $this->hasOne(Requirement::class, 'wedding_id');
    }
}
