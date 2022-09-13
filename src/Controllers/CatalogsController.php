<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CatalogsController extends Soap {

    public function index(Request $request, Response $response, $args) {
        return view($response,'dashboard');
    }

    public function get_catalogs(): Response {
        try {
            if(isset($_SESSION['session_id'])) {
                $session_id = $_SESSION['session_id'];
                $params = [
                    "sessionID" => $session_id,
                    "dateFrom" => null,
                    "dateTo" => null,
                    "pagination" => [
                        "InitLimit" => null,
                        "rowCount" => null,
                        "orders" => [
                            "criteria" => null,
                            "columnName" => null
                        ]
                    ]
                ];
                $result = $this->soap->GetCatalogs($params);
                return ajax_response(["status" => true,"catalogs"=>$result->catalogList]);
            }
            return ajax_response(["status" => false,"message" => "No se encontró autenticación"]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function get_prizes_categories(Request $request): Response {
        try {
            $params = $request->getParsedBody();
            if(isset($_SESSION['session_id'])) {
                $session_id = $_SESSION['session_id'];
                $params = [
                    "sessionID" => $session_id,
                    "onlyOutstandingPrizeCategory" => null,
                    "filterPrize" => null,
                    "pagination" => [
                        "InitLimit" => null,
                        "rowCount" => null,
                        "orders" => [
                            "criteria" => null,
                            "columnName" => null
                        ]
                    ],
                ];
                $result = $this->soap->GetPrizesCategories($params);
                return ajax_response(["status" => true,"prizes_categories"=>$result->categoryList]);
            }
            return ajax_response(["status" => false,"message" => "No se encontró autenticación"]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function get_prizes(Request $request): Response {
        try {
            $params_body = $request->getParsedBody();
            if(isset($_SESSION['session_id'])) {
                $session_id = $_SESSION['session_id'];
                $params = [
                    "sessionID" => $session_id,
                    "prize_ID" => null,
                    "catalog_ID" => ($params_body['catalog_id'] !== "")? $params_body['catalog_id'] : null,
                    "code" => null,
                    "category_ID" => ($params_body['category_id']!== "")? $params_body['catalog_id'] : null,
                    "stock" => null,
                    "onlyOutstandingPrize" => null,
                    "onlySeasonal" => null,
                    "filterKindSeenAndRedeemed" => null,
                    "lastDays" => null,
                    "prizesCount" => null,
                    "pagination" => [
                        "InitLimit" => null,
                        "rowCount" => null,
                        "orders" => [
                            "criteria" => null,
                            "columnName" => null,
                        ]
                     ]
                ];
                $result = $this->soap->GetPrizes($params);
                $prize_list = (isset($result->PrizeList))? $result : [];
                return ajax_response(["status" => true,"prizes"=>$prize_list]);
            }
            return ajax_response(["status" => false,"message" => "No se encontró autenticación"]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}