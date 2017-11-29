<?php

namespace App\Http\Controllers;

use Hashids;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Return the view for a  Student
     *
     * @return view
     */
    public function view($id)
    {
        $student = Student::where('id', Hashids::decode($id))->first();
        $data = [
            'student' => $student,
        ];

        return view('student.view')->with($data);
    }
    /**
     * Return the view for creating a new classgroup
     *
     * @return view
     */
    public function create()
    {
        return view('student.create');
    }

    /**
    *Store a new classgroup
    *
    *@return view
    **/
    public function store(Request $request, Student $student)
    {
        $student = new Student();

        $student->name = $request->get('name');
        $student->username = $request->get('username');
        $student->classgroup_id = Hashids::decode($request->get('classgroup_id'))[0];
        $student->save();

        return redirect(route('home'));
    }

    /**
    *Get the view for editing classgroup
    *
    *@return view
    **/
    public function edit($id, Student $student)
    {
        $data = [
            'student' => $student->where('id', Hashids::decode($id))->first(),
        ];
        return view('student.edit')->with($data);
    }

    /**
    *Update a classgroup
    *
    *@return view
    **/
    public function update($id, Request $request, Student $student)
    {
        $student = $student->where('id', Hashids::decode($id))->first();
        $student->name = $request->get('name');
        $student->username = $request->get('username');
        $student->classgroup_id = Hashids::decode($request->get('classgroup_id'))[0];
        $student->save();

        return redirect(route('home'));
    }
}
