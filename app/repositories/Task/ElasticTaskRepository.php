<?php

    namespace App\Repositories;

    use Elasticsearch\Client;
    use Rhumsaa\Uuid\Uuid;

    class ElasticTaskRepository implements TaskRepositoryInterface
    {

        private $sleep = false;

        public function __construct(Client $elasticsearch)
        {
            $this->elasticsearch = $elasticsearch;
        }

        /**
         * Get all records from elastic
         */
        public function getall()
        {
            $params['index'] = 'todo';
            $params['type']  = 'tasks';

            if($this->sleep){
                // Async vue.js issue
                sleep(1);
            }

            $results = $this->elasticsearch->search($params);
            $taskitems = [];
            foreach($results['hits']['hits'] as $tasks){

                $taskitems[] = [
                  'id'=> $tasks['_id'],
                  'task'=> $tasks['_source']['task'],
                  'status'=> isset($tasks['_source']['status']) ? $tasks['_source']['status'] : 0,
                   'created_at' => $tasks['_source']['created_at']
                ];
            }
            return \Response::json($taskitems);

        }


        /**
         * Delete a record and return a fresh index
         */
        public function delete($id)
        {

            $this->elasticsearch->delete([
                'index'=>'todo',
                'type'=>'tasks',
                'id'=>$id
            ]);

            $this->sleep = 1;
        }

        /**
         * Add a new record and return a fresh index
         */
        public function add($inputString)
        {
            // Generate an ID.
            $uuid1 = Uuid::uuid1();

            $this->elasticsearch->index([
              'index' => 'todo',
              'type' => 'tasks',
              'id' => $uuid1->toString(),
              'body' => [
                'task'=>$inputString,
                'created_at'=>time()
              ]
            ]);

            $this->sleep = 1;

        }


        /**
         * Update status of a record and return a fresh index
         */
        public function changestatus($id, $status)
        {

            $this->elasticsearch->update([
              'index' => 'todo',
              'type' => 'tasks',
              'id' => $id,
              'body' => [
                'doc'=>[
                  'status'=>$status
                  ]
                ]
            ]);

            $this->sleep = 1;

        }

    }