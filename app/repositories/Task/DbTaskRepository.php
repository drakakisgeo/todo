<?php

    namespace App\Repositories;

    use App\Task;

    class DbTaskRepository implements TaskRepositoryInterface
    {

        public function getall()
        {
            return Task::select('id','task','status','created_at')->get();
        }

        public function delete($id)
        {
            $task = Task::findOrFail($id);
            $task->delete();
        }

        public function add($inputString)
        {
            $task = new Task();
            $task->task = $inputString;
            $task->save();
        }

        public function changestatus($id, $status)
        {
            $task = Task::findOrFail($id);
            $task->status = $status;
            $task->save();
        }
    }