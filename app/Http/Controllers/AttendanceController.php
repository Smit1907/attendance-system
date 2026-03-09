<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Attendance;

class AttendanceController extends Controller
{

    // ===============================
    // Dashboard
    // ===============================

    public function dashboard()
    {

        $totalStudents = Student::count();

        $today = date('Y-m-d');

        $present = Attendance::where('date',$today)
                    ->where('status','Present')
                    ->count();

        $absent = Attendance::where('date',$today)
                    ->where('status','Absent')
                    ->count();

        $percentage = 0;

        if($totalStudents > 0)
        {
            $percentage = ($present / $totalStudents) * 100;
        }

        return view('dashboard',[
            'totalStudents'=>$totalStudents,
            'present'=>$present,
            'absent'=>$absent,
            'percentage'=>round($percentage,2)
        ]);

    }


    // ===============================
    // Attendance Page
    // ===============================

    public function index()
    {

        $classes = ClassRoom::all();

        return view('attendance.index',compact('classes'));

    }


    // ===============================
    // Load Students of Selected Class
    // ===============================

    public function getStudents(Request $request)
    {

        $students = Student::where('class_id',$request->class_id)
                    ->orderBy('roll_no')
                    ->get();

        return view('attendance.student_list',[
            'students'=>$students,
            'class_id'=>$request->class_id
        ]);

    }


    // ===============================
    // Save Attendance
    // ===============================

    public function store(Request $request)
    {

        $students = Student::where('class_id',$request->class_id)->get();

        foreach($students as $student)
        {

            $status = "Present";

            if(isset($request->absent[$student->id]))
            {
                $status = "Absent";
            }

            // check existing attendance
            $attendance = Attendance::where('student_id',$student->id)
            ->where('date',$request->date)
            ->where('start_time',$request->start_time)
            ->first();

            if($attendance)
            {

                // update if already exists

                $attendance->update([
                    'status'=>$status,
                    'end_time'=>$request->end_time
                ]);

            }
            else
            {

                // create new record

                Attendance::create([
                    'student_id'=>$student->id,
                    'date'=>$request->date,
                    'start_time'=>$request->start_time,
                    'end_time'=>$request->end_time,
                    'status'=>$status
                ]);

            }

        }

        return redirect('/attendance')
        ->with('success','Attendance Saved Successfully');

    }


    // ===============================
    // Attendance Report
    // ===============================

    public function report(Request $request)
    {

        $query = Attendance::join(
            'students',
            'students.id',
            '=',
            'attendances.student_id'
        )
        ->join(
            'class_rooms',
            'class_rooms.id',
            '=',
            'students.class_id'
        )
        ->select(
            'students.name',
            'students.roll_no',
            'class_rooms.class_name',
            'attendances.date',
            'attendances.start_time',
            'attendances.end_time',
            'attendances.status'
        );

        if($request->date)
        {
            $query->where('attendances.date',$request->date);
        }

        if($request->class_id)
        {
            $query->where('class_rooms.id',$request->class_id);
        }

        $records = $query->orderBy('date','desc')->get();

        $classes = ClassRoom::all();

        return view('attendance.report',compact('records','classes'));

    }


    // ===============================
    // Attendance Percentage
    // ===============================

    public function percentage()
    {

        $students = Student::all();

        $data = [];

        foreach($students as $student)
        {

            $total = Attendance::where('student_id',$student->id)->count();

            $present = Attendance::where('student_id',$student->id)
            ->where('status','Present')
            ->count();

            $percentage = 0;

            if($total > 0)
            {
                $percentage = ($present/$total)*100;
            }

            $data[] = [
                'name'=>$student->name,
                'roll'=>$student->roll_no,
                'percentage'=>round($percentage,2)
            ];

        }

        return view('attendance.percentage',compact('data'));

    }

}