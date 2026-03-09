<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Student extends Model
{
    protected $fillable = ['name','roll_no','class_id'];
}
