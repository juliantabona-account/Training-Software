<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'overview', 'announcement', 'img'
    ];

    public function clients()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function totalClients()
    {
      return $this->clients()
                  ->selectRaw('count(*) as count')
                  ->where('course_id', $this->id)
                  ->groupBy('course_id');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    public function moduleWithLessons()
    {
        return $this->modules()
        			->with('lessonsAndTests');
    }

    public function getImgAttribute($value)
    {
        if($value){
            return $value;
        }else{
            return '/assets/temp/placeholder.png';
        }
    }

}
