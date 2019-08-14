<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text','lesson_id', 'user_id'];

	public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
