<div class="panel panel-filter">
    <div class="panel-heading">
        <h2 class="panel-title">Filter</h2>
        @include('layout.partial.panel-open-close', ['prop' => 'filters'])
    </div>
    <div class="panel-body collapse" :class="{in: filters.open}">
        {!!Form::open(['method' => 'GET'])!!}
            {!!Form::hidden('s', 1)!!}
            <div class="row quick-search">
                <div class="col-sm-3 col-md-2">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        {!!Form::text(
                            'name',
                            Request::get('name'),
                            ['class' => 'form-control', 'placeholder' => 'Name']
                        )!!}
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        {!!Form::text(
                            'email',
                            Request::get('email'),
                            ['class' => 'form-control', 'placeholder' => 'Email']
                        )!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right">
                    {!!Form::submit('Search', ['class' => 'btn btn-success'])!!}
                </div>
            </div>
        {!!Form::close()!!}
    </div>
</div>
