<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address',
    ];

    public function user() {
    	return $this->hasOne('App\User');	
    }

    public function carts() {
        return $this->hasMany('App\Cart');
    }
}
