<div class="navbar navbar-default navbar-fixed-top toggle-visibility-navbar" role="banner">
    <div class="container-fulid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                {{ setting_value('title') }} <br/>
                <small>{{ setting_value('subtitle') }}</small>
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a class="text-uppercase" href="{{ url('/') }}">{{ trans('strings.home') }}</a>
                </li>
                <li>
                    <a class="text-uppercase" href="{{ url('articles') }}">{{ trans('strings.articles') }}</a>
                </li>
                <li>
                    <a class="text-uppercase" href="{{ url('knots') }}">Knots</a>
                </li>
                <li>
                    <a class="text-uppercase" href="{{ url('projects') }}">{{ trans('strings.projects') }}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form action="{{ url('search') }}" class="form-inline">
                        <input name="words" type="search" placeholder="{{ trans('strings.tips.input_search_words') }}" class="form-control search">
                    </form>
                </li>
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                           <img class="img-circle avatar" src="{{ asset(setting_value('avatar')) }}">
                           {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/articles/create">{{ trans('strings.new_article') }}</a></li>
                            <li><a href="{{ url('admin/articles/hub') }}">{{ trans('strings.hub') }}</a></li>
                            <li><a href="{{ url('admin/settings/profile') }}">{{ trans('strings.setting') }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">{{ trans('strings.logout') }}</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>