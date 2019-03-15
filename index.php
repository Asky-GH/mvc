<?php

require 'Router.php';

require 'controllers/MainController.php';
require 'controllers/SignInController.php';
require 'controllers/TaskController.php';

Router::addGetRoute('/', 'MainController@index');

Router::addGetRoute('/sign-in', 'SignInController@index');
Router::addPostRoute('/sign-in', 'SignInController@signIn');

Router::addGetRoute('/tasks', 'TaskController@index');
Router::addGetRoute('/tasks/create', 'TaskController@create');
Router::addPostRoute('/tasks', 'TaskController@store');
Router::addGetRoute('/tasks/show', 'TaskController@show');
Router::addGetRoute('/tasks/edit', 'TaskController@edit');
Router::addPostRoute('/tasks/edit', 'TaskController@update');

Router::dispatch();

