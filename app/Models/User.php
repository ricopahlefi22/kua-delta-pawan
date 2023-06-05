<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'photo',
        'ktp',
        'name',
        'email',
        'password',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socialAccount()
    {
        return $this->hasMany(SocialAccount::class, 'user_id');
    }

    public function wedding()
    {
        return $this->hasOne(Wedding::class, 'user_id');
    }

    public function partner()
    {
        return $this->hasOne(Partner::class, 'user_id');
    }

    public function requirement()
    {
        return $this->hasOne(Requirement::class, 'user_id');
    }
}
