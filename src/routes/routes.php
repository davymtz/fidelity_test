<?php

use App\Controllers\AuthController;
use Slim\App;
use App\Controllers\CatalogsController;
use App\middlewares\SessionMiddleware as Session;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/login', [AuthController::class, "view"])->setName("login");
    $app->post('/login', [AuthController::class, 'login']);
    $app->get('/logout', [AuthController::class, 'logout']);

    $app->group("/", function (RouteCollectorProxy $group) {
        $group->get("", [CatalogsController::class, "index"])
            ->setName("dashboard.index");

        $group->get("getCatalogs", [CatalogsController::class, "get_catalogs"])
            ->setName("dashboard.get_catalogs");

        $group->get("getPrizesCategories", [CatalogsController::class, "get_prizes_categories"])
            ->setName("dashboard.get_catalogs");

        $group->post("getPrizes", [CatalogsController::class, "get_prizes"])
            ->setName("dashboard.get_prizes");
    })->add(new Session());
};
