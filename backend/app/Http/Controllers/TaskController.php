<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use App\Services\TaskService;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function __construct(protected TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return $this->taskService->getAllTasks();
    }

    public function addTask(Request $request)
    {
        $task = $this->taskService->createTask($request);

        return response()->json($task, 201);
    }


    public function updateTask(Request $request, TaskModel $task, $id)
    {
        $updatedTask = $this->taskService->updateTask($task, $request, $id);

        return response()->json($updatedTask);
    }

    public function deleteTask(TaskModel $task, $id)
    {
        $this->taskService->deleteTask($task, $id);

        return response()->json(['message' => 'Tarefa excluída com sucesso']);
    }

}
