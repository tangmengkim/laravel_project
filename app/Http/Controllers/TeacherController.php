<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {
        // return Teacher::all();
        $teachers = Teacher::paginate(20);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->TeacherValidate($request);

        Teacher::create($request->all());
        return redirect()->route('teachers.index')->with('success', 'Teacher created');
    }



    public function update(Request $request, int $tid)
    {
        $Teacher = Teacher::findOrFail($tid);
        if ($Teacher == null) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }

        // dd($request->all());
        $this->TeacherValidate($request);

        $Teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', 'Teacher created');
    }

    public function destroy(int $tid)
    {
        $Teacher = Teacher::findOrFail($tid);
        if ($Teacher == null) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }
        $Teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted');
    }

    private function TeacherValidate(Request $request)
    {
        return $request->validate([
            'full_name' => 'required|string|max:512',
            'gender' => 'required|string|max:16',
            'degree' => 'required|string|max:256',
            'tel' => 'required|string|max:32'
        ]);
    }
}
