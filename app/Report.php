<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $casts = [
        'sheet' => 'collection'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'test_id', 'sheet', 'test_score'
    ];

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

}
