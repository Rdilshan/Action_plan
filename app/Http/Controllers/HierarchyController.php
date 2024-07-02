<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Strategy;
use App\Models\Action;
use App\Models\Subaction;

class HierarchyController extends Controller
{
    // Get all Goals
    public function indexGoals()
    {
        $goals = Goal::all();
        return view('Viewgoal', compact('goals'));
    }

    // Get Objectives by Goal
    public function getObjectives($goalId,$name)
    {
        $objectives = Objective::where('goal_id', $goalId)->get();
        return view('ViewObjective', [
            'objectives' => $objectives,
            'name' => $name,
            'goal_id' => $goalId
        ]);
    }

    // Get Strategies by Objective
    public function getStrategies($objectiveId)
    {
        $strategies = Strategy::where('objective_id', $objectiveId)->get();
        return view('viewstrategy', compact('strategies'));
    }

    // Get Actions by Strategy
    public function getActions($strategyId)
    {
        $actions = Action::where('strategy_id', $strategyId)->get();
        return view('Viewaction', compact('actions'));
    }

    // Get Subactions by Action
    public function getSubactions($actionId)
    {
        $subactions = Subaction::where('action_id', $actionId)->get();
        return view('Viewsubaction', compact('subactions'));
    }

    public function addgoal(Request $request)
    {

        $validatedData = $request->validate([
            'goalname' => 'required|string|max:255',
        ]);

        $goal = Goal::create([
            'name' => $validatedData['goalname']
        ]);

        return response()->json(['message' => 'Goal added successfully'], 200);
    }

    public function deleteGoal($id)
    {
        $user = Goal::findOrFail($id);
        $user->delete();
        return response()->json(['success' => 'Goal deleted successfully']);
    }

    public function editGoal(Request $request, $id)
    {
        $validatedData = $request->validate([
            'goalname' => 'required|string|max:255',
        ]);

        $goal = Goal::findOrFail($id);
        $goal->name = $validatedData['goalname'];
        $goal->save();

        return response()->json(['message' => 'Goal edited successfully', 'name' => $goal->name], 200);
    }

     // Add Objective
     public function addObjective(Request $request)
     {
         $validatedData = $request->validate([
             'Objectivename' => 'required|string|max:255',
             'goalid' => 'required|exists:goals,id',
         ]);

         $objective = Objective::create([
             'name' => $validatedData['Objectivename'],
             'goal_id' => $validatedData['goalid'],
         ]);

         return response()->json(['message' => 'Objective added successfully', 'objective' => $objective], 200);
     }


     public function deleteObjective($id)
     {
         $user = Objective::findOrFail($id);
         $user->delete();
         return response()->json(['success' => 'Objective deleted successfully']);
     }


     public function editObjective(Request $request, $id)
     {
         $validatedData = $request->validate([
             'Objectivename' => 'required|string|max:255',
         ]);

         $objective = Objective::findOrFail($id);
         $objective->name = $validatedData['Objectivename'];
         $objective->save();

         return response()->json(['message' => 'Objective edited successfully', 'name' => $objective->name], 200);
     }
}
