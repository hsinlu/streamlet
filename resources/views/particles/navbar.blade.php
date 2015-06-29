<div class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                {{ setting_value($settings, 'title') }} <br/>
                <small>{{ setting_value($settings, 'subtitle') }}</small>
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}">{{ trans('strings.home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/articles') }}">{{ trans('strings.articles') }}</a>
                </li>
                <li>
                    <a href="{{ url('/knots') }}">Knots</a>
                </li>
                <li>
                    <a href="{{ url('/projects') }}">{{ trans('strings.projects') }}</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="{{ url('/articles/hub') }}">Hub</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">{{ trans('strings.setting') }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">{{ trans('strings.logout') }}</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-search"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="search">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control" placeholder="{{ trans('strings.tips.input_search_words') }}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default pull-right">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div> 
                            </form>
                        </div>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>