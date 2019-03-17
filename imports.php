<?php

require 'app/controllers/AuthController.php';
require 'app/controllers/ErrorController.php';
require 'app/controllers/MainController.php';
require 'app/controllers/TaskController.php';

require 'app/models/Task.php';
require 'app/models/User.php';

require 'database/Connection.php';
require 'database/TaskDAO.php';
require 'database/UserDAO.php';

require 'Router.php';

require 'utils/Authentication.php';
require 'utils/Request.php';
require 'utils/Validation.php';