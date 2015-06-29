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
    					->orderby('published_at', 'desc')
    					->paginate(8);
        return view('categories.index', ['category' => $category, 'articles' => $articles]);
    }
}
