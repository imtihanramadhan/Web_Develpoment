<?php

it('renders student details and links to the create form', function () {
    $students = collect([
        (object) [
            'name' => 'Ahmad Fauzi',
            'nis' => '2024001',
            'classroom' => (object) ['name' => 'X-A'],
            'address' => 'Jl. Merdeka',
        ],
    ]);

    $view = $this->view('admin.students.index', compact('students'));

    $view
        ->assertSee(route('admin.student.create'))
        ->assertSee('Tambah Data')
        ->assertSee('Ahmad Fauzi')
        ->assertSee('2024001')
        ->assertSee('X-A')
        ->assertSee('Jl. Merdeka');
});
