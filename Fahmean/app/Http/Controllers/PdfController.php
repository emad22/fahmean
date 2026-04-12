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

        // تنظيف المسار
        $cleanPath = $path;
        $prefixes = ['storage/', 'public/'];
        foreach ($prefixes as $prefix) {
            if (str_starts_with($cleanPath, $prefix)) {
                $cleanPath = substr($cleanPath, strlen($prefix));
            }
        }

        // محاولة إيجاد الملف في عدة مسارات
        $possiblePaths = [
            storage_path('app/public/' . $cleanPath),
            storage_path('app/' . $cleanPath),
            public_path('storage/' . $cleanPath),
            public_path($cleanPath)
        ];

        $filePath = null;
        foreach ($possiblePaths as $tryPath) {
            if (file_exists($tryPath)) {
                $filePath = $tryPath;
                break;
            }
        }
        
        if (!$filePath) {
            abort(404, 'File not found');
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
        ]);
    }
}
