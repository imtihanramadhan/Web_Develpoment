<?php

it('renders the teacher list and sidebar menu', function () {
    $response = $this->get('/admin/teacher');

    $response
        ->assertOk()
        ->assertSee('Daftar Teacher')
        ->assertSee('Name')
        ->assertSee('NIP')
        ->assertSee('Subject')
        ->assertSee('Start Date')
        ->assertSee('/admin/subject')
        ->assertSee('/admin/teacher');
});
