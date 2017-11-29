{!!Form::open([
    'class' => 'confirm-delete',
    'url' => $url,
    'method' => 'DELETE',
])!!}
    <button type="submit" class="btn btn-text btn-unstyled">
        <i class="fa fa-trash"></i>
        <small>{{$deleteText or 'Delete'}}</small>
    </button>
{!!Form::close()!!}
