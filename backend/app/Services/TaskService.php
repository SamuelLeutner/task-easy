<?php
namespace App\Services;

use App\Models\TaskModel;
use App\Repository\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function getAllTasks()
    {
        return TaskModel::all();
    }

    public function createTask($request)
    {
        $request->validate([
            'task' => 'required|string',
            'resp' => 'nullable|string',
            'date' => 'nullable|date',
            'status' => 'required|string'

        ]);

        $data = [
            'task' => $request->task,
            'resp' => $request->resp ?? null,
            'date' => $request->date ?? null,
            'status' => $request->status
        ];

        return $this->taskRepository->create($data);
    }

    public function updateTask(TaskModel $task , $request, $id){
        $request->validate([
            'task' => 'required|string',
            'resp' => 'nullable|string',
            'date' => 'nullable|date',
            'status' => 'required|string'
        ]);

        $data = [
            'task' => $request->task,
            'resp' => $request->resp ?? null,
            'date' => $request->date ?? null,
            'status' => $request->status
        ];
        $task = TaskModel::find($id);
        return $this->taskRepository->update($task, $data, $id);
    }

    public function deleteTask(TaskModel $task, $id){
        $task = TaskModel::find($id);
        $this->taskRepository->delete($task, $id);
    }
}
