<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'UsersController::index');
$routes->post('/login', 'UsersController::login');
$routes->get('/liste', 'ListeController::index');
$routes->get('/accueil', 'AccueilController::index');
$routes->get('/mestaches', 'MyTasksController::index');
$routes->get('/test', 'TestController::index');
$routes->get('/data', 'HomeController::index');
$routes->get('ajax_crud/fetch_all', 'AjaxCrud::fetch_all');
$routes->setDefaultController('UsersController');
$routes->post('/UsersController/addUser', 'UsersController::addUser');
$routes->post('/UsersController/updateUser', 'UsersController::updateUser');
$routes->post('/UsersController/deleteUser', 'UsersController::deleteUser');
$routes->post('/update-task-status', 'MyTasksController::updateTaskStatus');
$routes->post('/ajouter-tache', 'MyTasksController::ajouterTache');

