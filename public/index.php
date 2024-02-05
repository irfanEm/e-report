<?php

require_once __DIR__ . "/../vendor/autoload.php";

use IRFANM\PHP\EREPORT\App\Route;
use IRFANM\PHP\EREPORT\Controller\HomeController;
use IRFANM\PHP\EREPORT\Controller\UserController;

Route::route("GET", "/", HomeController::class, "index", []);
Route::route("GET", "/404", HomeController::class, "notFound", []);

Route::route("GET", "/user-add", UserController::class, "addUserPage", []);
Route::route("POST", "/user-add", UserController::class, "addUserPost", []);

Route::gas();