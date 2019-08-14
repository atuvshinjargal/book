<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	 protected $fillable = [
	    'code', 'name', 'description', 'image','start_date', 'stop_date',
	    'stop_date', 'duration_time', 'teacher_id',
	  ];

	public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }
    public static function getLessonsByTeacher($teacher)
    {
    	return static::where('teacher_id', '=', $teacher->id)->get();
    }
    public function grades()
    {
        return $this->hasMany('App\Grade', 'lesson_id','id');
    }
    public function categories()
    {
        return $this->hasMany('App\Category', 'lesson_id','id');
    }
    public function questions()
    {
        return $this->hasMany('App\Question', 'lesson_id','id');
    }
}
