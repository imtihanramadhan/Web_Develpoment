<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::with('subject')->get();

        return view('admin.teacher.index', compact(
            'teachers'
        ));
    }

    public function create(): View
    {
        $subjects = Subject::query()->orderBy('name')->get();

        return view('admin.teacher.create', compact('subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|integer|min:0|unique:teachers,nip',
            'subject_id' => 'required|exists:subjects,id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama teacher wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'subject_id.required' => 'Subject wajib dipilih.',
            'subject_id.exists' => 'Subject tidak ditemukan.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Data teacher berhasil ditambahkan.');
    }
}
