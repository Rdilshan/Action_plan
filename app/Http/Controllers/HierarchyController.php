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
    public function getObjectives($goalId)
    {
        $objectives = Objective::where('goal_id', $goalId)->get();
        return view('ViewObjective', compact('objectives'));
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
}
