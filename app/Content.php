<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
	    'name', 'video' ,'text', 'week' , 'homework', 'category_id',
	];
    public static function getContentsByCategoryId($category_id)
    {
    	return static::where('category_id', '=', $category_id)->get();
    }
}
