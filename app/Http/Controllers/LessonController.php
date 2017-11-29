<?php

namespace App\Http\Controllers;

use Hashids;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Return the view for a  Lesson
     *
     * @return view
     */
    public function view($id)
    {
        $lesson = Lesson::where('id', Hashids::decode($id))->first();
        $data = [
            'lesson' => $lesson,
        ];

        return view('lesson.view')->with($data);
    }
    /**
     * Return the view for creating a new classgroup
     *
     * @return view
     */
    public function create()
    {
        return view('lesson.create');
    }

    /**
    *Store a new classgroup
    *
    *@return view
    **/
    public function store(Request $request, Lesson $lesson)
    {
        $lesson = new Lesson();

        $lesson->subject = $request->get('subject');
        $lesson->classgroup_id = Hashids::decode($request->get('classgroup_id'))[0];
        $lesson->points_question = $request->get('points_question');
        $lesson->points_level = $request->get('points_level');
        $lesson->questions = $request->get('questions');
        $lesson->save();

        return redirect(route('home'));
    }

    /**
    *Get the view for editing classgroup
    *
    *@return view
    **/
    public function edit($id, Lesson $lesson)
    {
        $data = [
            'lesson' => $lesson->where('id', Hashids::decode($id))->first(),
        ];
        return view('lesson.edit')->with($data);
    }

    /**
    *Update a classgroup
    *
    *@return view
    **/
    public function update($id, Request $request, Lesson $lesson)
    {
        $lesson = $lesson->where('id', Hashids::decode($id))->first();
        $lesson->subject = $request->get('subject');
        $lesson->classgroup_id = Hashids::decode($request->get('classgroup_id'))[0];
        $lesson->points_question = $request->get('points_question');
        $lesson->points_level = $request->get('points_level');
        $lesson->questions = $request->get('questions');
        $lesson->save();

        return redirect(route('home'));
    }
}
