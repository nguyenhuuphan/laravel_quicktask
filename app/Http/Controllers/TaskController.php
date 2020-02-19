<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Task\TaskValidator;
use App\Repositories\Task\TaskRepository;

class TaskController extends Controller
{
    public $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a list of all tasks
     * 
     * @return mixed
     */
    public function index(Request $request)
    {
        $tasks = $this->taskRepository->getTasksbyUser($request->user());
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Add New Task
     * 
     * @param Request $request
     */
    public function store(TaskValidator $request)
    {
        $validator = $request->validated();

        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $this->taskRepository->create($data);

        return redirect('tasks');
    }

    /**
     * Update a Task
     * 
     * @param Request $request
     */
    public function update(TaskValidator $request)
    {
        $validator = $request->validated();

        $data = $request->all();
        $this->taskRepository->update($data);

        if($request->ajax()) {
            return response()->json([
                    'success' => true,
            ]); 
        }
    }

    /**
     * Delete a Task
     * 
     * @param integer $task_id
     */
    public function destroy($task_id)
    {
        $this->authorize('destroy', $this->taskRepository->find($task_id));
        $this->taskRepository->delete($task_id);
        return redirect('tasks')->with('success');
    }
}
