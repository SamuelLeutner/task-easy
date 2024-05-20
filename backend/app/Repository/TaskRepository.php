<?php

namespace App\Repository;

use App\Models\TaskModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskRepository{

    protected $task;


    public function __construct(TaskModel $task)
    {
        $this->task = $task;
    }

    public function getAllTasks()
    {
        return $this->task->getAll();
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data)
        {
            return TaskModel::create([
                'task' => $data['task'],
                'resp'=> $data['resp'],
                'date' => $data['date'],
                'status' => $data['status'],
            ]);
        });
    }

    public function update(TaskModel $task, array $data)
    {
        return DB::transaction(function () use ($data, $task){
            $task->update([
                'task' => $data['task'],
                'resp'=> $data['resp'],
                'date' => $data['date'],
                'status' => $data['status']
            ]);
            $task->save();
            return $task;
        });

    }

    public function delete(TaskModel $task)
    {
        DB::transaction(function() use($task){
            $task->delete();
        });

    }
}
