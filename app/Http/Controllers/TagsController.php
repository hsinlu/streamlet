<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index($slug)
    {
    	$tag = Tag::where('slug', $slug)->firstOrFail();
        $articles = $tag->articles()
                        ->with('tags', 'category')
                        ->public()
                        ->orderby('published_at', 'desc')
                        ->paginate(8);
        return view('tags.index', ['tag' => $tag, 'articles' => $articles]);
    }
}
