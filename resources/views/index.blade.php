@extends('base')

@section('main')

    <div class="row">
        <div class="logo">
            <img src="img/logo.png" alt="todo">
            <h5 class="subtitle">A todo app [Laravel 5.1 / ElasticSearch]</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            {!! Form::open(['url'=>'#','class'=>'inline-form','id'=>'addtask']) !!}
            {!! Form::text('task',null,['class'=>'input-lg inputfull','placeholder'=>'Add your task!']) !!}
            {!! Form::submit('Add',['class'=>'btn btn-success btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@stop