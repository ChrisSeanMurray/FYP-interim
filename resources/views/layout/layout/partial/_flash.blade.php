@if(session('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
@endif

@if(session('notification'))
    <div class="alert alert-info">
        <p>{{session('notification')}}</p>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        <p>{{session('info')}}</p>
    </div>
@endif

@if(session('status'))
    <div class="alert alert-info">
        {!!session('status')!!}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        <p>{{session('warning')}}</p>
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger">
        {!!session('danger')!!}
    </div>
@endif
