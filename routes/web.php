<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return redirect('/attendance');
});

Route::resource('classes', ClassController::class);

Route::resource('students', StudentController::class);
Route::get('/students-upload',[StudentController::class,'upload']);
Route::post('/students-import',[StudentController::class,'import']);

Route::get('/attendance',[AttendanceController::class,'index']);
Route::post('/get-students',[AttendanceController::class,'getStudents']);
Route::post('/save-attendance',[AttendanceController::class,'store']);
Route::get('/attendance-percentage',[AttendanceController::class,'percentage']);
Route::get('/attendance-report',[AttendanceController::class,'report']);
Route::get('/export-attendance',[AttendanceController::class,'export']);
Route::get('/dashboard',[AttendanceController::class,'dashboard']); 