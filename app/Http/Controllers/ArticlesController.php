<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Article;
use App\Category;
use App\Tag;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::with('tags', 'category')
                            ->public()
                            ->latest('published_at')
                            ->paginate(setting_value('paginate_size')),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return Response
     */
    public function show($slug)
    {
        return view('articles.show', [
            'article' => Article::with('tags', 'category')
                            ->where('slug', $slug)
                            ->firstOrFail(),
        ]);
    }
}
