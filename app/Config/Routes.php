<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->useSupportedLocalesOnly(true);

$routes->group('{locale}', static function ($routes) {
    // List with paginate Expense
    $routes->get('expenses', 'Expense::list', ['as' => 'expenses.list']);

    // Create Expense
    $routes->post('expenses/new', 'Expense::new', ['as' => 'expenses.new']);

    // Delete Expense. Get ID from POST data!
    $routes->post('expenses/delete', 'Expense::delete', ['as' => 'expenses.delete']);

    // Show statistic Expense
    $routes->get('expenses/statistic', 'Expense::statistic', ['as' => 'expenses.statistic']);
});

// Login user
$routes->match(['get', 'post'], '{locale}/login', 'Security::login', ['as' => 'login']);

// Logout user
$routes->get('{locale}/logout', 'Security::logout', ['as' => 'logout']);

// Home page with locale
$routes->get('{locale}/', 'Home::index', ['as' => 'homepage']);

// Home page without locale
$routes->get('/', 'Home::index', ['as' => 'default_homepage']);
