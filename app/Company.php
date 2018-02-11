<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'contact', 'img'
    ];

    public function clients()
    {
        return $this->hasMany('App\User');
    }

}
