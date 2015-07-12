<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;

class CategoriesController extends Controller
{
    public function index($slug)
    {
    	$category = Category::where('slug', $slug)->firstOrFail();
    	$articles = Article::with('tags', 'category')
    					->where('category_id', $category->id)
    					->public()
    					->latest('published_at')
    					->paginate(setting_value('paginate_size'));
        return view('categories.index', ['category' => $category, 'articles' => $articles]);
    }
}
