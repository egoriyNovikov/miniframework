<?php

use App\Router\Router;
use App\Application\Controller\LibraryController;

Router::get('/api/', LibraryController::class, 'get');