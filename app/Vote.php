<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
	    'name','best', 'good' ,'bad','time'
	];
}
