<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    // =========================
    // Students List
    // =========================

    public function index(Request $request)
    {

        $classes = ClassRoom::all();

        $students = Student::join(
            'class_rooms',
            'class_rooms.id',
            '=',
            'students.class_id'
        )
        ->select(
            'students.id',
            'students.name',
            'students.roll_no',
            'students.class_id',
            'class_rooms.class_name'
        );

        if($request->class_id)
        {
            $students->where('students.class_id',$request->class_id);
        }

        if($request->search)
        {
            $students->where('students.name','LIKE','%'.$request->search.'%');
        }

        $students = $students->orderBy('roll_no')->get();

        return view('students.index',[
            'students'=>$students,
            'classes'=>$classes
        ]);

    }


    // =========================
    // Create Student
    // =========================

    public function create()
    {

        $classes = ClassRoom::all();

        return view('students.create',compact('classes'));

    }


    // =========================
    // Store Student
    // =========================

    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required',

            'roll_no'=>'required|unique:students,roll_no',

            'class_id'=>'required'

        ]);

        Student::create([

            'name'=>$request->name,

            'roll_no'=>$request->roll_no,

            'class_id'=>$request->class_id

        ]);

        return redirect('/students');

    }


    // =========================
    // Edit Student
    // =========================

    public function edit($id)
    {

        $student = Student::find($id);

        $classes = ClassRoom::all();

        return view('students.edit',[
            'student'=>$student,
            'classes'=>$classes
        ]);

    }


    // =========================
    // Update Student
    // =========================

    public function update(Request $request,$id)
    {

        $request->validate([

            'name'=>'required',

            'roll_no'=>'required|unique:students,roll_no,'.$id,

            'class_id'=>'required'

        ]);

        Student::where('id',$id)->update([

            'name'=>$request->name,

            'roll_no'=>$request->roll_no,

            'class_id'=>$request->class_id

        ]);

        return redirect('/students');

    }


    // =========================
    // Delete Student
    // =========================

    public function destroy($id)
    {

        Student::destroy($id);

        return redirect('/students');

    }


    // =========================
    // Upload Page
    // =========================

    public function upload()
    {

        return view('students.upload');

    }


    // =========================
    // Import Excel
    // =========================

    public function import(Request $request)
    {

        Excel::import(new StudentsImport,$request->file('file'));

        return redirect('/students');

    }

}