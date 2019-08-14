<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','firstname', 'lastname', 'user_id'];
     /**
     * The many-to-many relationship between posts and tags.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public static function getStudentByUser($user)
    {
    	return static::where('user_id', '=', $user->id)->first();
    }
    public function grades()
    {
        return $this->hasMany('App\Grade', 'student_id','id');
    }
}
