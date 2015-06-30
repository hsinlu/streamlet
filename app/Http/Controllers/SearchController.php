<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class SearchController extends Controller
{
	/**
	 * search
	 * 
	 * @param  string 
	 * @return view
	 */
    public function index(Request $request)
    {
		$words = $request->input('words', '');
		$query = Article::with('tags', 'category')->public();
		if (!empty($words)) {
			$query->where('title', 'like', '%'. $words . '%');
		}

        return view('search.index',[
            'articles' => $query->orderby('published_at', 'desc')
                            	->paginate(8),
        ]);
    }
}
