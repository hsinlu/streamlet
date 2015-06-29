<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'image', 'meta_title', 'meta_description', 'public', 'user_id', 'category_id'];

    /**
     * Query 
     * 
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePublic($query)
    {
        return $query->where('public', true);
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
