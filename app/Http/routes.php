<?php


    use App\Task;

    get('/',['as'=>'home', 'uses'=>'TasksController@index']);
post('/tasks',['as'=>'storeTask', 'uses'=>'TasksController@store']);
get('/taskslist','TasksController@tasksList');
post('/deletetask/{id}','TasksController@destroy');
post('/statuschanger/{id}/{status}','TasksController@statusChanger');

    // ->where('id', '[0-9a-z]+')->where('status','[0-1]{1}')
    // ->where('id', '[0-9]+')
    // Test
    get('/test',function(){

        $elastic = new App\Repositories\ElasticTaskRepository(new Elasticsearch\Client());

       // $elastic->add('this is a test');

        dd(Task::select('id','task','status')->get());

        $elastic->getall();

        return "done!";



    });