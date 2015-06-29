<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'slug', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
