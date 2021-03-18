<?php
    $routes = array(
        'ActorController'=>array(
            'actor/index'=>'index',
            'actor/([0-9]+)' => 'view/$1',
            'actor/add' => 'add',
            'actor/edit/([0-9]+)' => 'edit/$1'
        ),
        'GenreController'=>array(
            'genre/index'=>'index',
            'genre/([0-9]+)' => 'view/$1',
            'genre/add' => 'add',
            'genre/edit/([0-9]+)' => 'edit/$1'
        ),
        'MovieController'=>array(
            'movie/index'=>'index',
            'movie/([0-9]+)' => 'view/$1',
            'movie/add' => 'add',
            'movie/edit/([0-9]+)' => 'edit/$1'
        ),
        'ProducerController'=>array(
            'producer/index'=>'index',
            'producer/([0-9]+)' => 'view/$1',
            'producer/add' => 'add',
            'producer/edit/([0-9]+)' => 'edit/$1'
        ),
        'UserController'=>array(
            'register'=>'reg',
            'authorize' => 'auth'
        )
    );
