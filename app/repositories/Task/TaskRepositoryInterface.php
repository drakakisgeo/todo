<?php

    namespace App\Repositories;

    interface TaskRepositoryInterface
    {

        public function getall();
        public function add($inputString);
        public function changestatus($id,$status);
        public function delete($id);

    }