<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    // Tambahkan baris ini agar data dari Seeder diizinkan masuk
    protected $table = 'classrooms';
    protected $fillable = ['name', 'major'];

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }
}
