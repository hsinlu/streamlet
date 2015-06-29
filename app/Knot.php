<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knot extends Model
{
	protected $fillable = ['brief'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
}
