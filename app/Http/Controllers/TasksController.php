<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class TasksController extends Controller
{
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
        return Task::select('id','task','status')->get();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //var_dump(Request::all()['task']);
        $task = new Task();
        $task->task = Request::all()['task'];
        $task->save();

        return Task::select('id','task','status')->get();
    }

    /**
     * @param $id
     * @param $status
     *
     * Change the status of task
     */
    public function statusChanger($id,$status){

        $task = Task::findOrFail($id);
        $task->status = $status;
        $task->save();

        return Task::select('id','task','status')->get();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return $this->tasksList();
    }
}
