<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'contact', 'img'
    ];

    public function getImgAttribute($value)
    {
        if($value){
            return '/assets/companies/' . $value;
        }else{
            return '/assets/temp/placeholder.png';
        }
    }

}
