<?php

use Slim\Factory\AppFactory;

require __DIR__.'/vendor/autoload.php';

$app = AppFactory::create();

/**
 * The routing middleware should be added earlier than the ErrorMiddleware
 * Otherwise exceptions thrown from it will not be handled by the middleware
 */
$app->addRoutingMiddleware();

// Si tu proyecto esta en un subdirectorio, descomentar esta línea
// $app->setBasePath('/fidelity_test');

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */

 // Pretty error interface
$app->add(new Zeuxisoo\Whoops\Slim\WhoopsMiddleware());
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Config routes
$routes = require __DIR__."/src/routes/routes.php";
$routes($app);

$app->run();