<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [
        'title', 'overview', 'notes', 'video_uri'
    ];

    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

}
