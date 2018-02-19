<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;
    use EntrustUserTrait; //For Assigning User Roles And Permissions

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'year_of_birth', 'bio', 'email', 'mobile', 'avatar', 
        'status', 'verifyToken', 'preferences', 'tutorial', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'   //Remove pivot to load pivot data in collections
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'users';
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function lessonViews()
    {
        return $this->belongsToMany('App\Lesson')
                    ->orderBy('lesson_user.created_at', 'desc')
                    ->withTimestamps();
    }

    public function testSubmittions()
    {
        return $this->belongsToMany('App\Test')
                    ->orderBy('test_user.created_at', 'asc')
                    ->withPivot('pass_state', 'submittion')
                    ->withTimestamps();
    }

}
