<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/dashboard', 'DashboardController');

$router->post('/auth/google/verify', 'AuthController@verifyGoogleLogin');

$router->get('/members', 'MemberController@index');
$router->get('/members/{id}', 'MemberController@show');
$router->post('/members', 'MemberController@store');
$router->post('/members/{id}', 'MemberController@update');
$router->delete('/members', 'MemberController@destroy');

$router->get('/projects', 'ProjectController@index');
$router->get('/projects/{id}', 'ProjectController@show');
$router->post('/projects', 'ProjectController@store');
$router->post('/projects/{id}', 'ProjectController@update');
$router->delete('/projects', 'ProjectController@destroy');

$router->get('/companies', 'CompanyController@index');
$router->get('/companies/{id}', 'CompanyController@show');
$router->post('/companies', 'CompanyController@store');
$router->post('/companies/{id}', 'CompanyController@update');
$router->delete('/companies', 'CompanyController@destroy');

$router->get('/events', 'EventController@index');
$router->get('/events/{id}', 'EventController@show');
$router->post('/events', 'EventController@store');
$router->post('/events/{id}', 'EventController@update');
$router->delete('/events', 'EventController@destroy');

$router->get('/meetings', 'MeetingController@index');
$router->get('/meetings/{id}', 'MeetingController@show');
$router->post('/meetings', 'MeetingController@store');
$router->post('/meetings/{id}', 'MeetingController@update');
$router->delete('/meetings', 'MeetingController@destroy');