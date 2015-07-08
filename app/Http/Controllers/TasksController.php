<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepositoryInterface;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class TasksController extends Controller
{

    /**
     * @var TasksRepository
     */
    protected $task;

    public function __construct(TaskRepositoryInterface $task){

        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @return mixed
     * Get list of tasks
     */
    public function tasksList(){
        return $this->task->getall();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $taskfrominput = Request::all()['task'];
        $this->task->add($taskfrominput);
        return $this->task->getall();
    }

    /**
     * @param $id
     * @param $status
     *
     * Change the status of task
     */
    public function statusChanger($id,$status){

        $this->task->changestatus($id,$status);
        return $this->task->getall();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->task->delete($id);
        return $this->task->getall();
    }
}
