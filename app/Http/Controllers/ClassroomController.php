<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\View\View;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classrooms = Classroom::all();

        return view('admin.classroom', compact(
            'classrooms'
        ));
    }
}
