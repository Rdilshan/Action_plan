<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\funding;
use App\Models\Expense;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Strategy;
use App\Models\Action;
use App\Models\Subaction;
use App\Models\updateTask;


use PhpParser\Node\Stmt\TryCatch;




class TaskController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'introduction' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $subaction = $request->query('subaction');
        $validatedData['subaction'] = $subaction;

        // Handle file upload if a file was provided
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public');

            $validatedData['file'] = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'size' => $file->getSize(),
                'mime' => $file->getMimeType(),
            ];
        }

        // Store the data in the session
        session(['first_form_data' => $validatedData]);

        return redirect('addnewtask/second');
    }

    public function owntasklist()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('user.ListTasks', compact('tasks'));
    }

    public function viewalltask(Request $request)
    {
        $tasks = Task::all();
        return view('user.AllTaskview', compact('tasks'));
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

        funding::where('task_id', $id)->delete();
        Expense::where('task_id', $id)->delete();

        return response()->json(['success' => 'Objective deleted successfully']);
    }


    public function storeFinalForm(Request $request)
    {

        $data = $request->all();


        $accommodationData = $data['AccommodationData'] ?? [];
        $transportData = $data['TransportData'] ?? [];
        $fundingData = $data['fundingData'] ?? [];
        $note = $data['note'] ?? '';
        $otherData = $data['otherData'] ?? [];

        $firstFormData = session('first_form_data');

        $title = $firstFormData['title'];
        $name = $firstFormData['name'];
        $startDate = $firstFormData['start_date'];
        $endDate = $firstFormData['end_date'];
        $introduction = $firstFormData['introduction'];
        $subaction = $firstFormData['subaction'];


        $fileData = $firstFormData['file'] ?? null;

        $filePath = null;
        if ($fileData) {
            $filePath = $fileData['path'];
        }


        $task = Task::create([
            'Title' => $title,
            'subaction_id' => $subaction,
            'name' => $name,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'introduction' => $introduction,
            'File' => $filePath,
            'Note' => $note ?? null,
            'user_id' => auth()->user()->id,
        ]);


        $taskId = $task->id;

        foreach ($fundingData as $fund) {

            $fundingdata = funding::create([
                'name' => $fund['item'],
                'unit' => $fund['unit'],
                'unit_charge' => $fund['unitCharge'],
                'amount' => $fund['amount'],
                'task_id' => $taskId
            ]);

        }

        foreach ($transportData as $traspdata) {


            $transporttabledata = Expense::create([
                'name' => $traspdata['Transport'],
                'Type' => 'Transport',
                'no_unit' => $traspdata['nfvehical'],
                'totalKM' => $traspdata['totalkm'],
                'unit_cost' => $traspdata['unit'],
                'amount' => $traspdata['total'],
                'task_id' => $taskId
            ]);


        }

        foreach ($accommodationData as $accdata) {


            $accommodationtabledata = Expense::create([
                'name' => $accdata['Accommodation'],
                'Type' => 'Accommodation',
                'no_unit' => $accdata['nfperson'],
                'no_days' => $accdata['nfday'],
                'unit_cost' => $accdata['unit'],
                'amount' => $accdata['total'],
                'task_id' => $taskId
            ]);



        }

        foreach ($otherData as $othdata) {


            $othertabledata = Expense::create([
                'name' => $othdata['Others'],
                'Type' => 'Others',
                'no_unit' => $othdata['Quantity'],
                'no_days' => $othdata['nfday'],
                'unit_cost' => $othdata['unit'],
                'amount' => $othdata['total'],
                'task_id' => $taskId
            ]);



        }

        session()->forget('first_form_data');

        return response()->json(['success' => 'User created successfully!', 'data' => $note], 201);
    }


    public function editTask($id)
    {

        $task = Task::find($id);
        $goals = Goal::all();
        $funding = funding::where('task_id', $id)->get();
        $expense = Expense::where('task_id', $id)->get();

        $subaction_id = $task->subaction_id;
        $subaction = Subaction::find($subaction_id);
        $subaction_name = $subaction->name;

        $action_id = $subaction->action_id;
        $action = Action::find($action_id);
        $action_name = $action->name;

        $Strategy_id = $action->strategy_id;
        $strategy = Strategy::find($Strategy_id);
        $strategy_name = $strategy->name;

        $Objective_id = $strategy->objective_id;
        $objective = Objective::find($Objective_id);
        $objective_name = $objective->name;

        $goal_id = $objective->goal_id;
        $goal = Goal::find($goal_id);
        $goal_name = $goal->name;


        return view('user.EditTask1', compact('task', 'goals', 'funding', 'expense', 'subaction_name', 'action_name', 'strategy_name', 'objective_name', 'goal_name'));
    }

    public function vieweoncetTask($id)
    {

        $task = Task::find($id);
        $funding = funding::where('task_id', $id)->get();
        $expense = Expense::where('task_id', $id)->get();

        $subaction_id = $task->subaction_id;
        $subaction = Subaction::find($subaction_id);
        $subaction_name = $subaction->name;

        $action_id = $subaction->action_id;
        $action = Action::find($action_id);
        $action_name = $action->name;

        $Strategy_id = $action->strategy_id;
        $strategy = Strategy::find($Strategy_id);
        $strategy_name = $strategy->name;

        $Objective_id = $strategy->objective_id;
        $objective = Objective::find($Objective_id);
        $objective_name = $objective->name;

        $goal_id = $objective->goal_id;
        $goal = Goal::find($goal_id);
        $goal_name = $goal->name;


        return view('user.OnlyviewTask', compact('task', 'funding', 'expense', 'subaction_name', 'action_name', 'strategy_name', 'objective_name', 'goal_name'));
    }

    public function deleteTabledata($id1, $id2)
    {
        switch ($id2) {
            case 'funding':
                funding::where('id', $id1)->delete();
                break;

            case 'transport':
            case 'others':
            case 'accommodation':
                Expense::where('id', $id1)->delete();
                break;
        }
        return response()->json(['success' => 'Objective deleted successfully']);
    }


    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        $taskId = $task->id;


        if ($request->input('subaction') == 'opt1') {
            $subaction_id = $task->subaction_id;
        } else {
            $subaction_id = $request->input('subaction');
        }

        if ($request->file('file') != null) {

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file = $request->file('file');
                $filepath = $file->store('uploads', 'public');

            }
        } else {
            $filepath = $task->File;
        }


        if ($request->input('FundingDate') != null) {

            $fundingData = $request->input('FundingDate');

            foreach ($fundingData as $row) {

                $fundingdata = funding::create([
                    'name' => $row['item'],
                    'unit' => $row['unit'],
                    'unit_charge' => $row['unitCharge'],
                    'amount' => $row['amount'],
                    'task_id' => $taskId
                ]);
            }

        }



        if ($request->input('AccommodationtDate') != null) {
            $AccommodationtDate = $request->input('AccommodationtDate');

            foreach ($AccommodationtDate as $row) {

                $accommodationtabledata = Expense::create([
                    'name' => $row['Accommodation'],
                    'Type' => 'Accommodation',
                    'no_unit' => $row['nfperson'],
                    'no_days' => $row['nfday'],
                    'unit_cost' => $row['unit'],
                    'amount' => $row['total'],
                    'task_id' => $taskId
                ]);
            }
        }



        if ($request->input('TransportDate') != null) {
            $TransportDate = $request->input('TransportDate');

            foreach ($TransportDate as $row) {

                $transporttabledata = Expense::create([
                    'name' => $row['Transport'],
                    'Type' => 'Transport',
                    'no_unit' => $row['nfvehical'],
                    'totalKM' => $row['totalkm'],
                    'unit_cost' => $row['unit'],
                    'amount' => $row['total'],
                    'task_id' => $taskId
                ]);
            }

        }

        if ($request->input('OtherDate') != null) {
            $OtherDate = $request->input('OtherDate');

            foreach ($OtherDate as $row) {

                $othertabledata = Expense::create([
                    'name' => $row['Others'],
                    'Type' => 'Others',
                    'no_unit' => $row['Quantity'],
                    'no_days' => $row['nfday'],
                    'unit_cost' => $row['unit'],
                    'amount' => $row['total'],
                    'task_id' => $taskId
                ]);

            }
        }



        $task->update([
            'Title' => $request->input('title'),
            'startDate' => $request->input('start_date'),
            'endDate' => $request->input('end_date'),
            'introduction' => $request->input('introduction'),
            'File' => $filepath,
            'name' => $request->input('name'),
            'subaction_id' => $subaction_id,
            'Note' => $request->input('Note')
        ]);

        return redirect('/listTask');

    }

    public function updatetasksubmit(Request $request, $id)
    {
        $fileNames = [];
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . $file->getClientOriginalName();

                    $file->storeAs('uploads', $filename, 'public');
                    $fileNames[] = $filename;
                }
            }
        }

        $updateTask = updateTask::create([
            'task_id' => $id,
            'year' => $request->year,
            'percentage' => $request->percentage,
            'files' => json_encode($fileNames)
        ]);

        // dd($request->all(), $fileNames, $id,$updateTask);
        return redirect('/listTask');

    }

    public function updatesget($id)
    {
        $updates = updateTask::where('task_id', $id)->get();
        return view('user.Yearupdate', compact('updates', 'id'));
    }

    public function updatedeletetask(Request $request, $id)
    {
        $Task = updateTask::findOrFail($id);
        $Task->delete();

        return response()->json(['success' => 'Objective deleted successfully']);
    }
    public function updatereviewadd(Request $request, $id)
    {
        $userid = auth()->user()->id;
        $review = $request->input('review');

        $task = Task::findOrFail($id);

        $reviews = $task->review ? json_decode($task->review, true) : [];

        $reviews[] = [$userid, $review];

        $task->update([
            'review' => json_encode($reviews)
        ]);

        return response()->json(['message' => 'Review updated successfully']);
    }

}
