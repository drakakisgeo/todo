<?php

get('/',[
    'as'=>'home',
    'uses'=>'TasksController@index'
]);

post('/tasks',[
  'as'=>'storeTask',
  'uses'=>'TasksController@store'
]);

get('/taskslist','TasksController@tasksList');