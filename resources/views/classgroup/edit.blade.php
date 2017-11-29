@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Classgroup</div>
                    <div class="panel-body">
                            {{ Form::open(array('route' => ['classgroup.update', $class->hashid] , 'method' => 'put', 'class' => 'form-horizontal')) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Class Name', array('class' => 'col-md-4 control-label')) }}
                                {{ Form::text('name', $class->name, array('class' => 'form-control col-md-6')) }}
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::submit('Update') }}
                                </div>
                            </div>
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
