<?php

use App\Router\Router;
use App\Application\Controller\PageController;


Router::get('/', PageController::class, 'home');
Router::get('/about', PageController::class, 'about');