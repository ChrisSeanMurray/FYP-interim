@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                @foreach($classgroups as $class)
                    <div class="col-md-6 classgroup-card">
                        <a href="{{route('classgroup.view', $class->hashid)}}"> 
                            <h2>{{$class->name}}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
