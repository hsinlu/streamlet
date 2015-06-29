<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
 	public $timestamps = false;
    protected $fillable = ['name', 'value', 'description', 'type'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
