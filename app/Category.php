<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
	    'name', 'description', 'lesson_id',
	  ];
    public static function getCategoriesByLessonId($lesson_id)
    {
    	return static::where('lesson_id', '=', $lesson_id)->get();
    }
    public function contents()
    {
        return $this->hasMany('App\Content', 'category_id','id');
    }
    public function lesson()
    {
        return $this->belongsTo('App\Lesson', 'lesson_id', 'id');
    }
}
