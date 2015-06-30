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
    function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Edit or delete article
     * 
     * @param  string $slug [description]
     * @return [type]       [description]
     */
    public function hub($slug = '')
    {
        $articles = Article::orderby('published_at', 'desc')->paginate(8);
        $article = Article::with('tags', 'category')->where('slug', empty($slug) ? $articles->first()->slug : $slug)->firstOrFail();

        return view('articles.hub', [
            'articles' => $articles,
            'article' => $article,
        ]);
    }

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
                            ->orderby('published_at', 'desc')
                            ->paginate(8),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create', [
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request, Guard $auth)
    {
        // find or create category
        $category = Category::firstOrCreate([
            'name' => e($request->input('category')), 
            'slug' => e(str_slug($request->input('category'))),
            'user_id' => $auth->user()->id,
        ]);
        // find or create tags
        foreach ($request->input('tags') as $tag) {
            $tagids[] = Tag::firstOrCreate([
                            'name' => e($tag), 
                            'slug' => e(str_slug($tag)),
                            'user_id' => $auth->user()->id,
                        ])->id;
        }
        // create article
        $article = with(new Article)->fill($request->all());
        $article->slug = empty($article->slug) ? str_slug(pinyin($article->title)) : $article->slug;
        $article->user_id = $auth->user()->id;
        $article->category_id = $category->id;
        $article->public = $request->has('public') ? 1 : 0;
        $article->published_at = Carbon::now();
        $article->save();
        $article->tags()->sync($tagids);

        return redirect('articles/hub');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($slug)
    {
        return view('articles.edit', [
            'article' => Article::with('tags', 'category')->where('slug', $slug)->firstOrFail(),
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, Guard $auth, $slug)
    {
        // find or create category
        $category = Category::firstOrCreate([
            'name' => e($request->input('category')), 
            'slug' => e(str_slug($request->input('category'))),
            'user_id' => $auth->user()->id,
        ]);
        // find or create tags
        foreach ($request->input('tags') as $tag) {
            $tagids[] = Tag::firstOrCreate([
                            'name' => e($tag), 
                            'slug' => e(str_slug($tag)),
                            'user_id' => $auth->user()->id,
                        ])->id;
        }
        // create article
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->fill($request->all());
        $article->slug = empty($article->slug) ? str_slug(pinyin($article->title)) : $article->slug;
        $article->user_id = $auth->user()->id;
        $article->category_id = $category->id;
        $article->public = $request->has('public') ? 1 : 0;
        $article->published_at = Carbon::now();
        $article->update();
        $article->tags()->sync($tagids);

        return redirect('articles/hub');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($slug)
    {
        Article::where('slug', $slug)->delete();
        return redirect('articles/hub');
    }
}
