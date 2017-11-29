@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h2>
                            {{$name}}
                        </h2>
                        <a href="{{route('classgroup.edit', $hashid)}}">Edit classgroup</a>
                </div>

                <table  class='student-table'>
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Edit</th>
                    </tr>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td></td>
                        <td><a href="{{route('student.edit', $student->hashid)}}">edit</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
