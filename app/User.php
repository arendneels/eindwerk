<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone','email', 'password', 'address' , 'address2', 'city', 'country_id', 'postal_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function isAdmin(){
        foreach($this->roles as $role){
            if($role->name == "Admin"){
                return true;
            }
        }
        return false;
    }
}
