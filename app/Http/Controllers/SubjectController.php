<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\View\View;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::with('teachers')->get();

        return view('admin.subject', compact(
            'subjects'
        ));
    }
}
