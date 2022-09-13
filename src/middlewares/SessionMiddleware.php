<?php

namespace App\middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Response;
use Slim\Routing\RouteContext;

Class SessionMiddleware {
    /**
     * Before middleware invokable class
     *
     * @param  ServerRequest  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        session_start();
        $session_exists = $this->is_session_started();
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
        if(empty($route)) { throw new HttpNotFoundException($request, $response); }

        $response = new Response();
        if($session_exists) {
            $response = $handler->handle($request);
            return $response;
        } else {
            // $routeParser = $routeContext->getRouteParser();
            // $url = $routeParser->urlFor("dashboard.index");
            // $response->withHeader("Location", $url)->withStatus(302);
            // return $response;
        }

    }

    private function is_session_started() {
        // chequear que no esté ejecutándole desde la línea de comandos
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }
}