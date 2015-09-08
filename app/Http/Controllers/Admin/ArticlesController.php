<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Carbon\Carbon;

use App\Article;
use App\Category;
use App\Tag;

class ArticlesController extends Controller
{
    /**
     * Edit or delete article
     * 
     * @param  string $slug [description]
     * @return [type]       [description]
     */
    public function hub(Request $request, $slug = '')
    {
        $words = '';

        $articles = Article::latest('published_at');
        // search some
        if ($request->has('words')) {
            $words = e($request->input('words'));
            $articles->where('title', 'like', '%'. $words . '%');
        }
        $articles = $articles->paginate(8);
        $article = Article::with('tags', 'category')
                        ->where('slug', empty($slug) ? $articles->first()->slug : $slug)
                        ->firstOrFail();

        return view('admin.articles.hub', [
            'articles' => $articles,
            'article' => $article,
            'words' => $words,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.articles.create', [
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
            'slug' => e(str_slug(pinyin($request->input('category')))),
            'user_id' => $auth->user()->id,
        ]);
        // find or create tags
        foreach ($request->input('tags') as $tag) {
            $tagids[] = Tag::firstOrCreate([
                            'name' => e($tag), 
                            'slug' => e(str_slug(pinyin($tag))),
                            'user_id' => $auth->user()->id,
                        ])->id;
        }
        // create article
        $article = with(new Article)->fill($request->all());
        $article->slug = empty($article->slug) ? str_slug(pinyin($article->title)) : $article->slug;
        $article->cover = $this->saveCover($request, $article);
        $article->user_id = $auth->user()->id;
        $article->category_id = $category->id;
        $article->public = $request->has('public') ? 1 : 0;
        $article->published_at = Carbon::now();
        $article->save();
        $article->tags()->sync($tagids);

        flash()->success(trans('flash_messages.article_create_success'));

        return redirect('admin/articles/hub');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($slug)
    {
        return view('admin.articles.edit', [
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
            'slug' => e(str_slug(pinyin($request->input('category')))),
            'user_id' => $auth->user()->id,
        ]);
        // find or create tags
        foreach ($request->input('tags') as $tag) {
            $tagids[] = Tag::firstOrCreate([
                            'name' => e($tag), 
                            'slug' => e(str_slug(pinyin($tag))),
                            'user_id' => $auth->user()->id,
                        ])->id;
        }
        // create article
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->fill($request->all());
        $article->slug = empty($article->slug) ? str_slug(pinyin($article->title)) : $article->slug;
        $article->cover = $this->saveCover($request, $article);
        $article->user_id = $auth->user()->id;
        $article->category_id = $category->id;
        $article->public = $request->has('public') ? 1 : 0;
        $article->published_at = Carbon::now();
        $article->update();
        $article->tags()->sync($tagids);

        flash()->success(trans('flash_messages.article_update_success'));

        return redirect('admin/articles/hub');
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

        flash()->success(trans('flash_messages.article_delete_success'));

        return redirect('admin/articles/hub');
    }

    protected function saveCover(ArticleRequest $request, $article)
    {
        if (!$request->hasfile('cover')) {
            return $article->cover;
        }
        
        $file = $request->file('cover');

        if (!$file->isValid()) {
            throw new Exception(trans('strings.image_not_invalid'));
        }

        $filename = $article->slug . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/covers'), $filename);

        return url('images/covers/' . $filename);
    }
}
