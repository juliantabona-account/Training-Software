<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'marking_key' => 'collection'
    ];

    protected $fillable = [
        'title', 'notes', 'marking_key', 'user_id', 'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function testedUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
