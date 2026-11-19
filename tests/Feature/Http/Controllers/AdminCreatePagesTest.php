<?php

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

it('renders the student create form with its classroom options', function () {
    $classrooms = collect([
        (object) ['id' => 1, 'name' => 'X-A'],
    ]);
    $errors = new ViewErrorBag(['default' => new MessageBag]);

    $view = $this->view('admin.students.create', compact('classrooms', 'errors'));

    $view
        ->assertSee(route('admin.student.store'))
        ->assertSee('method="POST"', false)
        ->assertSee('name="name"', false)
        ->assertSee('name="nis"', false)
        ->assertSee('name="classroom_id"', false)
        ->assertSee('name="address"', false)
        ->assertSee('X-A');
});

it('renders the classroom create form with the matching store route', function () {
    $errors = new ViewErrorBag(['default' => new MessageBag]);
    $view = $this->view('admin.classroom.create', compact('errors'));

    $view
        ->assertSee(route('admin.classroom.store'))
        ->assertSee('name="name"', false)
        ->assertSee('name="major"', false);
});

it('renders the subject create form with the matching store route', function () {
    $teachers = collect([
        (object) ['id' => 1, 'name' => 'Budi'],
    ]);
    $errors = new ViewErrorBag(['default' => new MessageBag]);

    $view = $this->view('admin.subject.create', compact('teachers', 'errors'));

    $view
        ->assertSee(route('admin.subject.store'))
        ->assertSee('name="name"', false)
        ->assertSee('name="teacher_id"', false)
        ->assertSee('Budi');
});

it('renders the teacher create form with subject options', function () {
    $subjects = collect([
        (object) ['id' => 1, 'name' => 'Matematika'],
    ]);
    $errors = new ViewErrorBag(['default' => new MessageBag]);

    $view = $this->view('admin.teacher.create', compact('subjects', 'errors'));

    $view
        ->assertSee(route('admin.teacher.store'))
        ->assertSee('name="name"', false)
        ->assertSee('name="nip"', false)
        ->assertSee('name="subject_id"', false)
        ->assertSee('name="start_date"', false)
        ->assertSee('Matematika');
});

it('rejects a student submission with missing required fields', function () {
    $response = $this->post(route('admin.student.store'), [
        'name' => '',
        'nis' => '',
        'classroom_id' => '',
        'address' => '',
    ]);

    $response->assertInvalid([
        'name' => 'Nama siswa wajib diisi.',
        'nis' => 'NIS wajib diisi.',
        'classroom_id' => 'Kelas wajib dipilih.',
    ]);
});
