<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::with('teachers')->get();

        return view('admin.subject.index', compact(
            'subjects'
        ));
    }

    public function create(): View
    {
        $teachers = Teacher::query()->orderBy('name')->get();

        return view('admin.subject.create', compact('teachers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'nullable|exists:teachers,id',
        ], [
            'name.required' => 'Nama subject wajib diisi.',
            'teacher_id.exists' => 'Teacher tidak ditemukan.',
        ]);

        DB::transaction(function () use ($validated): void {
            $subject = Subject::create([
                'name' => $validated['name'],
            ]);

            if (isset($validated['teacher_id'])) {
                Teacher::query()
                    ->whereKey($validated['teacher_id'])
                    ->update(['subject_id' => $subject->id]);
            }
        });

        return redirect()
            ->route('admin.subject.index')
            ->with('success', 'Data subject berhasil ditambahkan.');
    }
}
