<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Strategy;
use App\Models\Action;
use App\Models\Subaction;
use App\Models\Task;


class TreeController extends Controller
{
    public function index(Request $request)
    {
        $dataset = [];
        $goals = Goal::all();

        foreach ($goals as $goal) {
            $goalData = [
                'name' => $goal->name,
                'objectives' => []
            ];

            $objectives = Objective::where('goal_id', $goal->id)->get();
            foreach ($objectives as $objective) {
                $objectiveData = [
                    'name' => $objective->name,
                    'strategies' => []
                ];

                $strategies = Strategy::where('objective_id', $objective->id)->get();
                foreach ($strategies as $strategy) {
                    $strategyData = [
                        'name' => $strategy->name,
                        'actions' => []
                    ];

                    $actions = Action::where('strategy_id', $strategy->id)->get();
                    foreach ($actions as $action) {
                        $actionData = [
                            'name' => $action->name,
                            'subactions' => []
                        ];

                        $subactions = Subaction::where('action_id', $action->id)->get();
                        foreach ($subactions as $subaction) {
                            // Collect subaction data
                            $subactionData = [
                                'name' => $subaction->name,
                                'tasks' => []
                            ];

                            // Get tasks for each subaction
                            $tasks = Task::where('subaction_id', $subaction->id)->get();
                            foreach ($tasks as $task) {
                                // $subactionData['tasks'][] = $task->Title;
                                $subactionData['tasks'][] = [
                                    'title' => $task->Title,
                                    'id' => $task->id
                                ];

                            }

                            // Add subaction data to the current action
                            $actionData['subactions'][] = $subactionData;
                        }

                        // Add action data to the current strategy
                        $strategyData['actions'][] = $actionData;
                    }

                    // Add strategy data to the current objective
                    $objectiveData['strategies'][] = $strategyData;
                }

                // Add objective data to the current goal
                $goalData['objectives'][] = $objectiveData;
            }

            // Add the fully built goal data to the dataset
            $dataset[] = $goalData;
        }

        // Pass the dataset to the view
        return view('user.summary', compact('dataset'));
    }

    public function load_data_into_model(Request $request){
        $id = $request->input('id');

        $tasks = Task::where('id', $id)->get();
        return response()->json($tasks);
    }
}
