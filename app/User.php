<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'l_user';

    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'ps_id', 'email', 'password', 'alamat', 'nomor_telepon', 'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function ProgramStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'ps_id');
    }

    public function dkbs()
    {
        return $this->hasMany(Dkbs::class, 'user_id');
    }


}
