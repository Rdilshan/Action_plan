<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'introduction' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        $subaction = $request->query('subaction');


        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public');
        }

        $task = Task::create([
            'Title' => $request->input('title'),
            'subaction_id' => $subaction,
            'name' => $request->input('name'),
            'startDate' => $request->input('start_date'),
            'endDate' => $request->input('end_date'),
            'introduction' => $request->input('introduction'),
            'File' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Task created successfully');
    }

}
