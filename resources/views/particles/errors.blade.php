@if($errors->any())
    <div class="errors">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ trans('strings.warning') }}</strong>&nbsp;{{ $error }}
            </div>
        @endforeach     
    </div>
@endif