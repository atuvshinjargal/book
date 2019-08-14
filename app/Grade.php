<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lesson_id','student_id', 'confirmed'];

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'id', 'lesson_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id','id');
    }
}
