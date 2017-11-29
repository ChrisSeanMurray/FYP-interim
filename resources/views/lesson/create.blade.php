@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new Lesson</div>
                    <div class="panel-body">
                            {{ Form::open(array('route' => 'lesson.store' , 'method' => 'post', 'class' => 'form-horizontal')) }}

                            <div class="form-group">
                                {{ Form::label('classgroup_id', 'Pick a Classgroup', array('class' => ' control-label')) }}
                                {{ Form::select('classgroup_id', Auth::user()->classgroupsSelectData, null, array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('subject', 'Student Name', array('class' => ' control-label')) }}
                                {{ Form::select('subject', config('settings.subjects'), null, array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('points_question', 'Points per question', array('class' => ' control-label')) }}
                                {{ Form::number('points_question', '', array('class' => 'form-control col-md-6')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('points_level', 'Points per game level', array('class' => ' control-label')) }}
                                {{ Form::number('points_level', '', array('class' => 'form-control col-md-6')) }}
                            </div>
                            <questions></questions>
                            <div class="form-group">
                                <div class="submit-button">
                                    {{ Form::submit('Create') }}
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
