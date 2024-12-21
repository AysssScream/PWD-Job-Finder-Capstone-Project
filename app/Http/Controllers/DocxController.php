<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DocxController extends Controller
{
    public function download()
    {
        $filePath = 'public/docx_template/resume_template.docx';

        // Check if the file exists
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Return the file for download
        return Storage::download($filePath);
    }
}
