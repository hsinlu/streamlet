@extends('admin.app')

@section('content')
<div class="settings">
	<nav class="settings-navbar">
		<ul>
		  <li class="{{ is_pattern(['admin/settings/general', 'admin/settings/general/*']) ? 'active' : '' }}"><a href="{{ url('admin/settings/general') }}"><i class="fa fa-cog"></i>General</a></li>
		  <li class="{{ is_pattern(['admin/settings/profile', 'admin/settings/profile/*']) ? 'active' : '' }}"><a href="{{ url('admin/settings/profile') }}"><i class="fa fa-user"></i>Profile</a></li>
		  <li class="{{ is_pattern(['admin/settings/categories', 'admin/settings/categories/*']) ? 'active' : '' }}"><a href="{{ url('admin/settings/categories') }}"><i class="fa fa-folder-o"></i>Categories</a></li>
		  <li class="{{ is_pattern(['admin/settings/tags', 'admin/settings/tags/*']) ? 'active' : '' }}"><a href="{{ url('admin/settings/tags') }}"><i class="fa fa-tags"></i>Tags</a></li>
		</ul>
	</nav>
	<div class="settings-content">
		@yield('settings-content')
	</div>
</div>
@endsection