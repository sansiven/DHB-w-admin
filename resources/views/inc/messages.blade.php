@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
@endif

@if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{!! session('flash_message_error') !!}</strong>
    </div>
@endif 
@if(Session::has('flash_message_success'))
    <div class="alert alert-sucess alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
@endif  