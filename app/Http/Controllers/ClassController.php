<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;


class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        ClassRoom::create([
            'class_name' => $request->class_name
        ]);

        return redirect('/classes');
    }
}
