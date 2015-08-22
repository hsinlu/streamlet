@extends('admin.app')

@section('header')
<link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')
<div class="article-edit">
<form id="article-form" method="POST" action="{{ url('admin/articles/update/' . $article->slug) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name='id' value="{{ $article->id }}">
    
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <input id="title" name="title" type="text" class="title"
                value="{{ old('title', $article->title) }}" placeholder="{{ trans('strings.admin.article_edit.title_placeholder') }}" required/>
                <textarea id="editor" name="body" placeholder="{{ trans('strings.admin.article_edit.body_placeholder') }}" required>
                {{ old('body', $article->body) }}
                </textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="image-uploader">
                    <span class="media"></span>
                    <img src="{{ old('cover', $article->cover) }}">
                    <div class="description">{{ trans('strings.admin.article_edit.cover')}}</div>
                    <input type="file" name="cover">
                    <button type="button" class="close"><span>&times;</span></button>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">{{ trans('strings.admin.article_edit.article_url') }}</label>
                <input id="slug" type="text" class="form-control" name="slug" placeholder="Article Url" v-model="slug" value="{{ old('slug', $article->slug) }}"/>
                <p class="help-block">{{ url('/') }}/@{{slug}}</p>
            </div>

            <div class="form-group">
                <label for="category">{{ trans('strings.admin.article_edit.article_category') }}</label>
                <select name="category" id="category" class="form-control" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}" {{ old('category', $article->category->name) ==  $category->name ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">{{ trans('strings.admin.article_edit.article_tags') }}</label>
                <select name="tags[]" id="tags" class="form-control" value="{{ $article->tags }}" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->name }}" {{ collect(old('tags[]', $article->tags))->contains('name', $tag->name) ? 'selected="selected"' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="checkbox">
                <label>
                    <input name="public" type="checkbox" {{ old('public', $article->public) ? 'checked' : '' }}>{{ trans('strings.admin.article_edit.public') }}
                </label>
            </div>

{{--             <div class="form-group">
                <label for="published_at">Publish Date</label>
                <input id="published_at" type="time" class="form-control" name="published_at" placeholder="Publish Date" value="{{ old('published_at') }}"/>
            </div> --}}
            
            <div class="form-group">
            <div class="btn-group dropup">
                <button type="submit" class="btn btn-primary">{{ trans('strings.admin.article_edit.publish') }}</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@section('scripts')
    <script src="/vendor/ckeditor/ckeditor.js"></script>
    <script src="/vendor/ckeditor/config.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/vue.min.js"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace("editor", {
                uiColor: "#FAFAFA",
                height: 350,
                filebrowserImageUploadUrl: "{{ url('images/ckupload') }}"
            });
        });

        $("#category").select2({
            tags: true,
            maximumSelectionLength: 1,
            placeholder: "{{ trans('strings.choose_category') }}"
        });
        $("#tags").select2({
            tags: true,
            placeholder: "{{ trans('strings.choose_tags') }}"
        });

        new Vue({
            el: '#article-form',
            data: {
                slug: ''
            }
        });
    </script>
@endsection