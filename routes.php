<?php

use Core\Router;

Router::addGetRoute('/400', 'ErrorController@badRequest');
Router::addGetRoute('/403', 'ErrorController@forbidden');
Router::addGetRoute('/404', 'ErrorController@notFound');

Router::addGetRoute('/', 'MainController@index');
Router::addGetRoute('/about', 'MainController@about');
Router::addGetRoute('/dayside', 'MainController@dayside');

Router::addGetRoute('/sign-in', 'AuthController@index');
Router::addPostRoute('/sign-in', 'AuthController@signIn');
Router::addPostRoute('/sign-out', 'AuthController@signOut');

Router::addGetRoute('/tasks', 'TaskController@show');
Router::addGetRoute('/tasks/create', 'TaskController@create');
Router::addPostRoute('/tasks', 'TaskController@store');
Router::addGetRoute('/tasks/edit', 'TaskController@edit');
Router::addPostRoute('/tasks/edit', 'TaskController@update');