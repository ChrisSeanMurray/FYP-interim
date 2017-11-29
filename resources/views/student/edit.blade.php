@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$student->name}}</div>
                    <div class="panel-body">
                            {{ Form::open(array('route' => ['student.update', $student->hashid ], 'method' => 'put', 'class' => 'form-horizontal')) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Student Name', array('class' => ' control-label')) }}
                                {{ Form::text('name', $student->name, array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('username', 'Username', array('class' => ' control-label')) }}
                                {{ Form::text('username', $student->username, array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('classgroup_id', 'Pick a Classgroup', array('class' => ' control-label')) }}
                                {{ Form::select('classgroup_id', Auth::user()->classgroupsSelectData, $student->classgroup->hashid, array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                <div class="submit-button">
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
