<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\EducationLevel;
use App\Models\Grade;

$levels = EducationLevel::all();
echo "Levels count: " . $levels->count() . "\n";
foreach ($levels as $level) {
    echo "Level: {$level->name} (ID: {$level->id})\n";
    $grades = Grade::where('education_level_id', $level->id)->get();
    echo "  Grades found: " . $grades->count() . "\n";
    foreach ($grades as $grade) {
        echo "    - {$grade->name} (ID: {$grade->id})\n";
    }
}
