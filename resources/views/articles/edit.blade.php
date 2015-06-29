@extends('admin')

@section('header')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')
@include('particles.errors', ['errors' => $errors])
<div class="article-edit">
<form id="article-form" method="POST" action="{{ url('articles/update/' . $article->slug) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name='id' value="{{ $article->id }}">
    
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <input id="title" name="title" type="text" class="title"
                value="{{ $article->title }}" placeholder="{{ trans('strings.admin.article_edit.title_placeholder') }}" required/>
                <textarea id="editor" name="body" placeholder="{{ trans('strings.admin.article_edit.body_placeholder') }}" required>
                {{ $article->body }}
                </textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <section id="ember1114" class="ember-view image-uploader js-post-image-upload">
                    <span class="media">
                        <span class="hidden">Image Upload</span>
                    </span>
                    <img class="js-upload-target" src="" style="display: none;">
                    <div class="description">Add post image<strong></strong></div>
                    <input data-url="upload" class="js-fileupload main fileupload" type="file" name="uploadimage">
                    <div class="js-fail failed" style="display: none">Something went wrong :(</div><button class="js-fail btn btn-green" style="display: none">Try Again</button><a class="image-url" title="Add image from URL"><span class="hidden">URL</span></a>
                </section>
            </div>

            <div class="form-group">
                <label for="slug">{{ trans('strings.admin.article_edit.article_url') }}</label>
                <input id="slug" type="text" class="form-control" name="slug" placeholder="Article Url" v-text="slug" value="{{ $article->slug }}"/>
                <p class="help-block">{{ url('/') }}/@{{slug}}</p>
            </div>

            <div class="form-group">
                <label for="category">{{ trans('strings.admin.article_edit.article_category') }}</label>
                <select name="category" id="category" class="form-control" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}" {{ $article->category->name ==  $category->name ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">{{ trans('strings.admin.article_edit.article_tags') }}</label>
                <select name="tags[]" id="tags" class="form-control" value="{{ $article->tags }}" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->name }}" {{ $article->tags->contains('name', $tag->name) ? 'selected="selected"' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="checkbox">
                <label>
                    <input name="public" type="checkbox" {{ $article->public ? 'checked' : '' }}>{{ trans('strings.admin.article_edit.public') }}
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
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/config.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
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

        var demo = new Vue({
            el: '#article-form',
            data: {
                slug: ''
            }
        });
    </script>
@endsection