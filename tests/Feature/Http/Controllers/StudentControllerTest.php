<?php

it('renders the student data supplied by the controller', function () {
    $response = $this->get('/admin/student');

    $response
        ->assertSee('Ahmad Fauzi')
        ->assertSee('2024001')
        ->assertSee('X-A')
        ->assertSee('Budi Santoso')
        ->assertSee('Inactive');
});
