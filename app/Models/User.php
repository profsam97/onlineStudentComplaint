<?php

namespace App\Models;

use App\Models\Result;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function roles(){
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function isAdmin(){
        if($this->roles->name == 'Admin')
            return true;
        else
            return false;
    }
    public function return(){
        return redirect('admin');
    }
    public function results(){
        return $this->hasMany('App\Models\Result', 'user_id');
    }
    public function lecturers(){
        return $this->hasMany('App\Models\Lecturer');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
