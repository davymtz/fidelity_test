<?php
/** Global helpers functions. */

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Psr7\Response as Psr7Response;

if(!function_exists("view")) {
    function view(Response $response, $template, $with = []) {
        $views = __DIR__.'/../views/';
        $cache = __DIR__."/../cache/";
        $blade = new Blade($views,$cache);
        $response->getBody()->write($blade->render($template, $with));
        return $response;
    }
}

if(!function_exists("aax_response")) {
    function ajax_response($arr = [], $status = 200): Psr7Response {
        $response = new Psr7Response();
        $response->getBody()->write(json_encode($arr));
        return $response->withHeader('Content-type', 'application/json')->withStatus($status);
    }
}