<div class="widget widget-profile">
    <div class="cover" style="background: url('{{ asset(setting_value('cover')) }}') no-repeat 10% center;">
        <div class="avatar">
            <img class="img-circle" src="{{ asset(setting_value('avatar')) }}">
        </div>
    </div>
    <div class="bio">
        <h4 class="text-center">
            <a href="{{ url('/') }}">{{ setting_value('name') }}</a></h4>
        <hr/>
        <p class="text-center">
            {!! setting_value('bio') !!}
        </p>
    </div>
</div>