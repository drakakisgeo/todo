@extends('base')

@section('main')
<div id="tasksblock">
    <div class="row">
        <div class="logo">
            <img src="img/logo.png" alt="todo">
            <h5 class="subtitle">A todo app [Laravel 5.1 / ElasticSearch]</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            {!! Form::open(['route'=>'storeTask','class'=>'inline-form','id'=>'addtask','v-on'=>'submit:addTask']) !!}
            {!! Form::text('task',null,['class'=>'input-lg inputfull','placeholder'=>'Add your task!','v-model'=>'newTask','el'=>'taskfield']) !!}
            {!! Form::submit('Add',['class'=>'btn btn-success btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>Remaining tasks: <strong>@{{ tasks.length }}</strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-condensed" style="margin-top:20px">
                <thead>
                <tr>
                    <th></th>
                    <th>Task</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-repeat="taskitem:tasks">
                    <td class="text-center">{!! Form::checkbox('taskid',1,null,['el'=>'@{{taskitem.id}}','v-on'=>'click:completeTask(taskitem.id)']) !!}</td>
                    <td v-on="click: editTask(taskitem)">@{{ taskitem.task }}</td>
                    <td class="text-center"><a href="#" v-on="click:removeTask(taskitem)"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop