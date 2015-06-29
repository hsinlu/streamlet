<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class DashboardController extends Controller
{
    public function index($slug='')
    {
		$articles = Article::orderby('published_at', 'desc')->paginate(8);
		$article = Article::with('tags', 'category')->where('slug', empty($slug) ? $articles->first()->slug : $slug)->firstOrFail();

        return view('dashboard.index', [
        	'articles' => $articles,
        	'article' => $article,
        ]);
    }
}
