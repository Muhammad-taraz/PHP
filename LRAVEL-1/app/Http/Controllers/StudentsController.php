<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    //this will show the student record page
    public function index()
    {
        $students = Students::orderBy('id', 'asc')->get();

        return view('students.list', [
            'students' => $students
        ]);
    }

    //this will show the student create page
    public function create()
    {
        return view('students.create');
    }

    //this will store the student record in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'gender' => 'required',
            'grade' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('students.create')->withInput()->withErrors($validator);
        }

        // here we will insert records in db
        $students = new Students();
        $students->name = $request->name;
        $students->gender = $request->gender;
        $students->grade = $request->grade;
        $students->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    //this will edit student record
    public function edit($id)
    {
        $student = Students::findOrFail($id);
        return view('students.edit', [
            'student' => $student
        ]);
    }

    //this will update the student record page
    public function update($id, Request $request)
    {
        $student = Students::findOrFail($id);
        $rules = [
            'name' => 'required|min:5',
            'gender' => 'required',
            'grade' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('students.edit', $student->id)->withInput()->withErrors($validator);
        }

        // here we will insert records in db
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->grade = $request->grade;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    //this will delete the student record page
    public function destroy($id)
    {
        $student = Students::findOrFail($id);

        //delete record from db
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

}
