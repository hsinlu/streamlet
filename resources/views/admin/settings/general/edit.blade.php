@extends('admin.settings.app')

@section('settings-content')
	<div class="page-header">
		<h3>General</h3>
	</div>

	<form method="POST" action="{{ url('admin/settings/general') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">Website Title</label>
            <input id="title" type="text" class="form-control no-border" name="title" placeholder="Website Title" value="{{ old('title', $title) }}" required/>
            <p class="help-block">The title of your website.</p>
        </div>

        <div class="form-group">
            <label for="subtitle">Website Subtitle</label>
            <input id="subtitle" type="text" class="form-control no-border" name="subtitle" placeholder="Website Subtitle" value="{{ old('subtitle', $subtitle) }}" required/>
            <p class="help-block">The subtitle of your website.</p>
        </div>

        <div class="form-group">
            <label for="keywords">Website Keywords</label>
            <textarea id="keywords" name="keywords" class="form-control no-border" placeholder="Website Keywords" rows="3" required>{{ old('keywords', $keywords) }}</textarea>
            <p class="help-block">The keywords of your website.</p>
        </div>

        <div class="form-group">
            <label for="description">Website Description</label>
            <textarea id="description" name="description" class="form-control no-border" placeholder="Website Description" rows="3" required>{{ old('description', $description) }}</textarea>
            <p class="help-block">The description of your website.</p>
        </div>

        <div class="form-group">
            <label for="paginate_size">Articles per page</label>
            <input id="paginate_size" type="number" class="form-control no-border" name="paginate_size" placeholder="Articles per page" value="{{ old('paginate_size', $paginate_size) }}" required/>
            <p class="help-block">How many articles should be displayed on each page.</p>
        </div>

        <div class="form-group form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection