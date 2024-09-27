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
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Task created successfully');
    }

    public function owntasklist()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('user.ListTasks', compact('tasks'));
    }


    public function selecttasklist($id,$name)
    {
        $tasks = Task::where('subaction_id', $id)->get();

        return view('viewTask', [
            'tasks'=> $tasks,
            'name' => $name
        ]);

    }

    public function deleteTask($id)
    {
        $Task = Task::findOrFail($id);
        $Task->delete();
        return response()->json(['success' => 'Objective deleted successfully']);
    }


}
