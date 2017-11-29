{!!Form::open([
    'url' => $url,
    'method' => 'POST',
])!!}
    <button type="submit" class="btn btn-text btn-unstyled">
        <i class="fa fa-undo"></i>
        <small>Restore</small>
    </button>
{!!Form::close()!!}
