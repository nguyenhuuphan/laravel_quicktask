<?php

namespace App\Repositories\Task;

use App\Repositories\RepositoryInterface;
use App\Task;
use App\User;

class TaskRepository implements RepositoryInterface
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function all()
    {
        return $this->task->all();
    }

    public function find($id)
    {
        return $this->task->find($id);
    }

    public function delete($id)
    {
        return $this->task->find($id)->delete();
    }

    public function create(array $data)
    {
        return $this->task->create($data);
    }

    public function update(array $data)
    {
        return $this->task->update($data);
    }

    public function getTasksbyUser(User $user)
    {
        return $user->tasks()->get();
    }
}