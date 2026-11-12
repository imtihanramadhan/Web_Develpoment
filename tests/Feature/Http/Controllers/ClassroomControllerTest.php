<?php

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders all seeded classrooms in the classroom table', function () {
    $this->seed();

    $response = $this->get('/admin/classroom');

    $response
        ->assertSee('Daftar Classroom')
        ->assertSee('Name')
        ->assertSee('Major')
        ->assertSee('X PPLG 1')
        ->assertSee('X PPLG 2')
        ->assertSee('XI PPLG 1')
        ->assertSee('XI PPLG 2')
        ->assertSee('X DKV 1')
        ->assertSee('X DKV 2')
        ->assertSee('XI DKV 1')
        ->assertSee('XI DKV 2')
        ->assertSee('X Animasi 1')
        ->assertSee('XI Animasi 1');

    expect(Classroom::count())->toBe(10);
});
