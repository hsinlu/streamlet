@extends('admin.settings.app')

@section('settings-content')
    <div class="profile">
        <div class="page-header">
            <h3>Profile</h3>
        </div>

        <form method="POST" action="{{ url('admin/settings/profile') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="cover" style="background: url('{{ asset(setting_value('cover')) }}') no-repeat 10% center;">
                <input id="cover-file" type="file" name="cover">
                <div class="avatar">
                    <input id="avatar-file" type="file" name="avatar">
                    <img id="avatar-img" class="img-circle" src="{{ asset(setting_value('avatar')) }}">
                    <div class="mask">
                        <div class="toolbar">
                            <a id="btn-change-avatar" href="javascript:" alt="Change"><i class="fa fa-link"></i></a>
                            <a id="btn-reset-avatar" href="javascript:" alt="Reset"><i class="fa fa-chain-broken"></i></a>
                        </div>
                    </div>
                </div>
                <div class="toolbar">
                    <button id="btn-reset-cover" class="btn btn-danger" type="button">Reset Cover</button>
                    <button id="btn-change-cover" class="btn btn-default" type="button">Change Cover</button>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Your name</label>
                <input id="name" type="text" class="form-control no-border" name="name" placeholder="Your name" value="{{ old('name', $name) }}" required/>
                <p class="help-block">Your name.</p>
            </div>

            <div class="form-group">
                <label for="bio">Your bio</label>
                <textarea id="bio" name="bio" class="form-control no-border" placeholder="Your bio" rows="3" required>{{ old('bio', $bio) }}</textarea>
                <p class="help-block">Your bio.</p>
            </div>

            <div class="form-group">
                <label for="email">Your email</label>
                <input id="email" type="email" class="form-control no-border" name="email" placeholder="Your email" value="{{ old('email', $email) }}" required/>
                <p class="help-block">Your email.</p>
            </div>

            <div class="form-group form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection