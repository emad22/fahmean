<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EducationLevel;
use App\Models\Grade;
use App\Models\Subject;


class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Education Levels
        $levels = [
            'ابتدائي',
            'إعدادي',
            'ثانوي'
        ];

        foreach ($levels as $levelName) {
            $level = EducationLevel::create(['name' => $levelName]);

            // Grades لكل مستوى
            for ($i = 1; $i <= 3; $i++) {
                $grade = Grade::create([
                    'name' => $levelName . ' - سنة ' . $i,
                    'education_level_id' => $level->id
                ]);

                // Subjects لكل Grade
                Subject::insert([
                    ['name' => 'اللغة العربية', 'grade_id' => $grade->id],
                    ['name' => 'الرياضيات', 'grade_id' => $grade->id],
                    ['name' => 'الدراسات الاجتماعية', 'grade_id' => $grade->id],
                    ['name' => 'العلوم', 'grade_id' => $grade->id],
                ]);
            }
        }
    }
}
