<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = Subject::query()->inRandomOrder()->limit(10)->get();

        if ($subjects->isEmpty()) {
            $subjects = Subject::factory(10)->create();
        }

        foreach ($subjects as $subject) {
            Teacher::factory()->for($subject)->create();
        }
    }
}
