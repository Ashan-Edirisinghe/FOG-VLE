<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinalSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'submissionType' => 'required|in:project,document,presentation',
            'file' => [
                'required',
                'file',
                'max:50000', // 50MB max size
                function ($attribute, $value, $fail) use ($request) {
                    $type = $request->input('submissionType');
                    $extension = strtolower($value->getClientOriginalExtension());
                    
                    $allowed = [
                        'project' => ['zip'],
                        'document' => ['pdf'],
                        'presentation' => ['ppt', 'pptx']
                    ];

                    if (!in_array($extension, $allowed[$type])) {
                        $fail("The file must be a " . implode(' or ', $allowed[$type]) . " file for {$type} submissions.");
                    }
                }
            ],
            'comments' => 'nullable|string'
        ]);

        try {
            // Generate a unique filename
            $fileName = time() . '_' . str_slug($request->title) . '.' . $request->file('file')->getClientOriginalExtension();
            
            // Store the file in a type-specific directory
            $path = $request->file('file')->storeAs(
                'submissions/' . $request->submissionType,
                $fileName,
                'public'
            );

            // Here you would typically save the submission details to your database
            // For example:
            // Submission::create([
            //     'title' => $request->title,
            //     'description' => $request->description,
            //     'file_path' => $path,
            //     'comments' => $request->comments,
            //     'user_id' => auth()->id()
            // ]);

            return response()->json([
                'message' => 'Submission successful',
                'path' => $path
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error processing submission',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
