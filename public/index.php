<?php
session_start();
require_once '../app/controllers/AuthController.php';
require_once '../app/models/User.php';
require_once '../app/core/Router.php';
require_once '../config/routes.php';

// auth routes 
Route::get('/register', [AuthController::class, 'Register']);
Route::post('/register', [AuthController::class, 'Register']);
Route::get('/login', [AuthController::class, 'Login']);
Route::post('/login', [AuthController::class, 'Login']);
Route::post('/logout', [AuthController::class, 'logout']);



$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>
