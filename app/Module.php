<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    protected $fillable = [
        'title'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson')
                    ->withPivot('position')
                    ->orderBy('position', 'asc')
                    ->withCount('tests');
    }
     
    public function lessonsAndTests()
    {
        return $this->belongsToMany('App\Lesson')
                    ->withPivot('position')
                    ->orderBy('position', 'asc')
                    ->with('tests');
    }

}
