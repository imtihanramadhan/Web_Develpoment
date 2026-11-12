<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('students', 'classroom')) {
            return;
        }

        if (! Schema::hasColumn('students', 'classroom_id')) {
            Schema::table('students', function (Blueprint $table) {
                $table->foreignId('classroom_id')
                    ->nullable()
                    ->after('classroom')
                    ->constrained('classrooms');
            });
        }

        DB::table('students')->orderBy('id')->chunkById(100, function (Collection $students) {
            foreach ($students as $student) {
                $classroomId = DB::table('classrooms')
                    ->where('name', $student->classroom)
                    ->value('id');

                if ($classroomId === null) {
                    throw new \RuntimeException("Classroom '{$student->classroom}' was not found.");
                }

                DB::table('students')
                    ->where('id', $student->id)
                    ->update(['classroom_id' => $classroomId]);
            }
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('classroom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('students', 'classroom_id')) {
            return;
        }

        Schema::table('students', function (Blueprint $table) {
            $table->string('classroom')->nullable();
        });

        DB::table('students')->orderBy('id')->chunkById(100, function (Collection $students) {
            foreach ($students as $student) {
                $classroomName = DB::table('classrooms')
                    ->where('id', $student->classroom_id)
                    ->value('name');

                if ($classroomName === null) {
                    throw new \RuntimeException("Classroom ID '{$student->classroom_id}' was not found.");
                }

                DB::table('students')
                    ->where('id', $student->id)
                    ->update(['classroom' => $classroomName]);
            }
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropConstrainedForeignId('classroom_id');
        });
    }
};
