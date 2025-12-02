<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'firstname'=> 'Max',
            'lastname' => 'Mustermann',
            'email' => 'mac@example.com',
            'age' =>21,
            'matriculation_number' =>'MAT-' . Str::upper(Str::random(6)),

        ]);

        Student::factory()->count(10)->create();
    }
}
