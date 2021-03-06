<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Billable;

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

    // Many to many relationship with roles
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    // One to many relationship with countries
    public function country(){
        return $this->belongsTo('App\Country');
    }

    // Checks if the user has the role admin
    public function isAdmin(){
        foreach($this->roles as $role){
            if($role->name == "Admin"){
                return true;
            }
        }
        return false;
    }

    // One to many relationship with orders
    public function orders(){
        return $this->hasMany('App\Order')->orderBy('created_at', 'desc');
    }

}
