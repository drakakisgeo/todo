<?php

get('/',['as'=>'home', 'uses'=>'TasksController@index']);
post('/tasks',['as'=>'storeTask', 'uses'=>'TasksController@store']);
get('/taskslist','TasksController@tasksList');
post('/deletetask/{id}','TasksController@destroy')->where('id', '[0-9]+');
post('/statuschanger/{id}/{status}','TasksController@statusChanger')->where('id', '[0-9]+')->where('status','[0-1]{1}');