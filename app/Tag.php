<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'user_id'];

	public function user() 
	{
		return $this->belongsTo(User::class);
	}

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function knots()
    {
    	return $this->belongsToMany(Knots::class);
    }
}
