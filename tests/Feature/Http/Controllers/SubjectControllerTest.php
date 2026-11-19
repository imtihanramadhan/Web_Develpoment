<?php

it('renders the subject list and sidebar menu', function () {
    $response = $this->get('/admin/subject');

    $response
        ->assertOk()
        ->assertSee('Daftar Subject')
        ->assertSee(route('admin.subject.create'))
        ->assertSee('Tambah Data')
        ->assertSee('Name')
        ->assertSee('Teacher')
        ->assertSee('/admin/subject')
        ->assertSee('/admin/teacher');
});
