<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;

class User extends Authenticatable
{
    use CrudTrait;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function loginAs()
    {
        return $this->role->label;
    }

    public function isAdmin()
    {
        return $this->role->id == 1;
    }

    public function isCustomer()
    {
        return $this->role->id == 2;
    }
    
    public function isManager()
    {
        return $this->role->id == 3;
    }

    public function isAkuntan()
    {
        return $this->role->id == 4;
    }
}
