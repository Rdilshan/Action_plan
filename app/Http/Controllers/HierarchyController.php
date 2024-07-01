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
        return view('hierarchy.goals.index', compact('goals'));
    }

    // Get Objectives by Goal
    public function getObjectives($goalId)
    {
        $objectives = Objective::where('goal_id', $goalId)->get();
        return view('hierarchy.objectives.index', compact('objectives'));
    }

    // Get Strategies by Objective
    public function getStrategies($objectiveId)
    {
        $strategies = Strategy::where('objective_id', $objectiveId)->get();
        return view('hierarchy.strategies.index', compact('strategies'));
    }

    // Get Actions by Strategy
    public function getActions($strategyId)
    {
        $actions = Action::where('strategy_id', $strategyId)->get();
        return view('hierarchy.actions.index', compact('actions'));
    }

    // Get Subactions by Action
    public function getSubactions($actionId)
    {
        $subactions = Subaction::where('action_id', $actionId)->get();
        return view('hierarchy.subactions.index', compact('subactions'));
    }
}
