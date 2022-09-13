<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response as HttpResponse;

class AuthController extends Soap {

    public function view(Request $request, Response $response, $args) {
        return view($response,'login');
    }

    public function login(Request $request, Response $response, $args) {
        try {
            $params = $request->getParsedBody();
            $result = $this->soap->SynchroAndLogin($params);
            if ($result->answerCode != 0) {
                $response->getBody()->write("Credenciales inválidas");
                return $response->withHeader('Content-Type', 'application/json')->withStatus(401);
            }
            session_start();
            $_SESSION['is_active'] = true;
            $_SESSION["session_id"] = $result->sessionID;
            $_SESSION['user'] = [
                'id' => $result->operator->id,
                'username' => $result->operator->username,
                'name' => $result->operator->name,
            ];
            $response->getBody()->write(json_encode(["message"=>"successfull"]));
            return $response->withHeader('Content-type', 'application/json')->withStatus(200);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function logout(): HttpResponse {
        session_start();
        session_destroy();
        $response = New Response();
        return $response->withHeader("Location", "login")->withStatus(200);
    }
}