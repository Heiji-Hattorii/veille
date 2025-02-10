<?php
session_start();
require_once '../app/controllers/AuthController.php';
require_once '../app/models/User.php';
require_once '../app/models/Subject.php';
require_once '../app/models/Presentation.php';
require_once '../app/core/Router.php';
require_once '../config/routes.php';
require_once '../app/controllers/StudentController.php';
require_once '../app/controllers/SubjectController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/PresentationController.php';
require_once '../app/controllers/HomeController.php';


// auth routes 
Route::get('/acceuil', [HomeController::class, 'showHomePage']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'Register']);
Route::post('/register', [AuthController::class, 'Register']);
Route::get('/login', [AuthController::class, 'Login']);
Route::post('/login', [AuthController::class, 'Login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
Route::get('/student/suggest', [StudentController::class, 'dashboard']);
Route::get('/student/suggest', [StudentController::class, 'suggestSubject']);
Route::post('/student/suggest', [StudentController::class, 'suggestSubject']);

Route::post('/student/update', [StudentController::class, 'updateSubject']);
Route::post('/student/delete', [StudentController::class, 'deleteSubject']);




Route::get('/admin/users', [AdminController::class, 'manageUsers']);
Route::post('/admin/delete', [AdminController::class, 'deleteUser']);
Route::post('/admin/updatestatus', [AdminController::class, 'updatestatus']);


Route::get('/admin/subjects', [SubjectController::class, 'manageSubjects']);
Route::post('/subject/updatestatus', [SubjectController::class, 'updateSubjectStatus']);
Route::post('/subject/delete', [SubjectController::class, 'deleteSubject']);
Route::post('/admin/assign/{subject_id}', [SubjectController::class, 'assignSubject']);

Route::post('/admin/subject/add', [SubjectController::class, 'addSubject']); 
Route::post('/admin/subject/update', [SubjectController::class, 'updateSubject']);
Route::get('/subjects/list', [SubjectController::class, 'listSubjects']);
Route::post('/admin/subject/delete', [SubjectController::class, 'deleteSubject']);




Route::get('/admin/presentations', [PresentationController::class, 'listPresentations']);


Route::get('/admin/presentation/create', [PresentationController::class, 'createPresentation']);

Route::post('/admin/presentation/save', [PresentationController::class, 'savePresentation']);


$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>
