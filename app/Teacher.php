<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','firstname', 'lastname', 'work', 'graduate', 'degree', 'direction', 'schooling', 'user_id'];
     /**
     * The many-to-many relationship between posts and tags.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public static function getTeacherByUser($user)
    {
    	return static::where('user_id', '=', $user->id)->first();
    }
    public function lessons()
    {
        return $this->hasMany('App\Lesson','teacher_id','id');
    }
}
