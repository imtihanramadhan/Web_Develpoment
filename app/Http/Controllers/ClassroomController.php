<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classrooms = Classroom::all();

        return view('admin.classroom.index', compact(
            'classrooms'
        ));
    }

    public function create(): View
    {
        return view('admin.classroom.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama classroom wajib diisi.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data classroom berhasil ditambahkan.');
    }
}
