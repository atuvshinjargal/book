<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'file', 'content_id', 'student_id'];

	public function user()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }
}
