<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'alamat',
        'nohp',
        'path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function layanan()
    {
        return $this->hasMany('App\Models\Layanan', 'user_id', 'id');
    }

    public function layanan_detail()
    {
        return $this->hasMany('App\Models\LayananDetail', 'user_id', 'id');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Models\Notifikasi', 'user_id', 'id');
    }
}
