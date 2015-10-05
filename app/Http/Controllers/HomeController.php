<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'articles' => Article::with('tags', 'category')
            				->public()
            				->latest('published_at')
            				->simplePaginate(setting_value('paginate_size')),
        ]);
    }
}
