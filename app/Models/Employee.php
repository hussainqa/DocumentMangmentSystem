<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;
    protected $guard = 'employee';
    protected $table ='employee';
    protected $fillable = ['name','email','password','phone'];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function group()
    {
        return $this->belongsToMany(group::class)->withTimestamps()->withPivot('Role');
    }

    public function document()
    {
        return $this->belongsToMany(document::class)->withTimestamps();
    }
    public function taged_employee()
    {
        return $this->belongsToMany(document::class,'taged_employee')->withTimestamps();
    }



}
