<?php

namespace App\Http\Controllers;

use Hashids;
use App\User;
use App\Classgroup;
use Illuminate\Http\Request;

class ClassgroupController extends Controller
{

    /**
     * Return the view for a  classgroup
     *
     * @return view
     */
    public function view($id)
    {
        $classgroup = Classgroup::where('id', Hashids::decode($id))->first();
        $data = [
            'name' => $classgroup->name,
            'students' => $classgroup->students,
            'hashid' => $classgroup->hashid,
        ];

        return view('classgroup.view')->with($data);
    }
    /**
     * Return the view for creating a new classgroup
     *
     * @return view
     */
    public function create()
    {
        return view('classgroup.create');
    }

    /**
    *Store a new classgroup
    *
    *@return view
    **/
    public function store(Request $request)
    {
        Classgroup::create([
            'name' => $request->get('name'),
            'user_id' => \Auth::user()->id,
        ]);
        return redirect(route('home'));
    }

    /**
    *Get the view for editing classgroup
    *
    *@return view
    **/
    public function edit($id, Classgroup $class)
    {
        $data = [
            'class' => $class->where('id', Hashids::decode($id))->first(),
        ];
        return view('classgroup.edit')->with($data);
    }

    /**
    *Update a classgroup
    *
    *@return view
    **/
    public function update($id, Request $request, Classgroup $class)
    {
        $class = $class->where('id', Hashids::decode($id))->first();
        $class->name = $request->get('name');
        $class->save();

        return redirect(route('home'));
    }
}
