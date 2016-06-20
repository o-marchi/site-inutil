<?php

Router::get('/', 'HomeController.index');
Router::get('/users', 'UserController.show');
Router::post('/destroy', 'UserController.destroy');
Router::post('/create', 'UserController.create');
Router::post('/edit', 'UserController.edit');
