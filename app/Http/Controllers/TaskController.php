<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    //
    public function store(Request $request)
    {



        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'introduction' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle file upload if a file was provided
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $path = $file->store('uploads');

            $validatedData['file'] = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'size' => $file->getSize(),
                'mime' => $file->getMimeType(),
            ];
        }


        session(['first_form_data' => $validatedData]);


        return redirect()->route('second.form.show');


        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'name' => 'required|string|max:255',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date',
        //     'introduction' => 'required|string',
        //     'file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        // ]);

        // $subaction = $request->query('subaction');


        // $filePath = null;
        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $filePath = $file->store('uploads', 'public');
        // }

        // $task = Task::create([
        //     'Title' => $request->input('title'),
        //     'subaction_id' => $subaction,
        //     'name' => $request->input('name'),
        //     'startDate' => $request->input('start_date'),
        //     'endDate' => $request->input('end_date'),
        //     'introduction' => $request->input('introduction'),
        //     'File' => $filePath,
        //     'user_id' => auth()->user()->id,
        // ]);

        // return redirect()->back()->with('success', 'Task created successfully');
    }

    public function owntasklist()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('user.ListTasks', compact('tasks'));
    }


    public function selecttasklist($id, $name)
    {
        $tasks = Task::where('subaction_id', $id)->get();

        return view('viewTask', [
            'tasks' => $tasks,
            'name' => $name
        ]);

    }

    public function deleteTask($id)
    {
        $Task = Task::findOrFail($id);
        $Task->delete();
        return response()->json(['success' => 'Objective deleted successfully']);
    }


// app/Http/Controllers/TaskController.php
    public function storeFinalForm(Request $request)
    {

        $data = $request->all();

        return response()->json(['success' => 'User created successfully!', 'data' => $data], 201);

        // $validatedData = $request->validate([
        //     'introduction' => 'required|string',
        //     'file' => 'nullable|file',
        // ]);
        // $firstFormData = session('first_form_data');
        // $allData = array_merge($firstFormData, $validatedData);
        // if ($request->hasFile('file')) {
        //     $allData['file'] = $request->file('file')->store('uploads');
        // }
        // Task::create($allData);
        // session()->forget('first_form_data');
        // return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }


}
