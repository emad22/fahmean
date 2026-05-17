<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    /**
     * Display the PDF viewer page (Blade wrapper).
     */
    public function showViewer(Request $request)
    {
        $path = $request->query('path');
        $title = $request->query('title', 'ملف الدرس');
        
        return view('dashboard.student.pdf-player', compact('path', 'title'));
    }

    /**
     * Stream the PDF file content for the viewer via Iframe/PDF.js
     */
    public function streamFile(Request $request)
    {
        $path = $request->query('path');
        
        if (!$path) {
            abort(404, 'Path requirement');
        }

        // تنظيف المسار وإزالة البادئة إن وجدت
        $cleanPath = $path;
        $prefixes = ['storage/', 'public/'];
        foreach ($prefixes as $prefix) {
            if (str_starts_with($cleanPath, $prefix)) {
                $cleanPath = substr($cleanPath, strlen($prefix));
            }
        }

        // 1. البحث في القرص العام (Public Storage Disk)
        if (Storage::disk('public')->exists($cleanPath)) {
            $filePath = Storage::disk('public')->path($cleanPath);
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
            ]);
        }

        // 2. البحث في القرص المحلي الافتراضي (Local Storage Disk)
        if (Storage::disk('local')->exists($cleanPath)) {
            $filePath = Storage::disk('local')->path($cleanPath);
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
            ]);
        }

        // 3. البحث في المسارات المادية التقليدية كخيار احتياطي
        $possiblePaths = [
            storage_path('app/public/' . $cleanPath),
            storage_path('app/' . $cleanPath),
            public_path('storage/' . $cleanPath),
            public_path($cleanPath)
        ];

        foreach ($possiblePaths as $tryPath) {
            if (file_exists($tryPath)) {
                return response()->file($tryPath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . basename($tryPath) . '"'
                ]);
            }
        }
        
        abort(404, 'File not found');
    }
}
