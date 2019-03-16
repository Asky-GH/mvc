<?php

chmod("dayside", 0777);

require 'Request.php';
require 'Router.php';

require 'utils/Authentication.php';
require 'utils/Validation.php';

require 'controllers/MainController.php';
require 'controllers/SignInController.php';
require 'controllers/TaskController.php';
require 'controllers/ErrorController.php';

require 'database/Connection.php';
require 'database/UserDAO.php';
require 'database/TaskDAO.php';

require 'models/User.php';
require 'models/Task.php';

Router::addGetRoute('/', 'MainController@index');

Router::addGetRoute('pure-brook-55369.herokuapp.com/sign-in', 'SignInController@index');
Router::addPostRoute('/sign-in', 'SignInController@signIn');

Router::addGetRoute('/tasks', 'TaskController@show');
Router::addGetRoute('/tasks/create', 'TaskController@create');
Router::addPostRoute('/tasks', 'TaskController@store');
Router::addGetRoute('/tasks/edit', 'TaskController@edit');
Router::addPostRoute('/tasks/edit', 'TaskController@update');

Router::addGetRoute('/403', 'ErrorController@forbidden');
Router::addGetRoute('/404', 'ErrorController@notFound');

session_start();

Router::dispatch();
