<?php

    namespace App\Repositories;

    interface UserControllerInterface {
        public function signin( array $data );
        public function signup( array $data );
    }