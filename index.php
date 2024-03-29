<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';
require 'rb.php';
\Slim\Slim::registerAutoloader();


R::setup();

// Instantiate application
$app = new \Slim\Slim(array());

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, and `Slim::delete`
 * is an anonymous function.
 */

$app->get('/', function () use ($app) {
    $app->render('main.php', array(
        'user' => 'Binom User'
    ));
});

$app->get('/new', function () use ($app) {
    $app->render('main.php');
});

$app->get('/account', function () use ($app) {
    $app->render('account.php', array(
        'user' => 'Binom User'
    ));
});

$app->get('/account/new', function () use ($app) {
    $app->render('account.php');
});


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
