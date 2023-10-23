<?php

namespace App\Routes;

use Slim\App;
//use App\???\???;


$app = new App(['settings' => ['displayErrorDetails' => true]]);

/**
 * As linhas 15 a 23 são necessárias para se permitir o acesso dessas rotas por outros sistemas.
 * O padrão é ter acesso liberado somentre para quem estiver no mesmo servidor. Essa restrição está relacionada ao CORS 
 */
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});


 // Get container
 $container = $app->getContainer();


//Adicione suas rotas aqui!
//$app->get('/', NomeController::class . ":nomeMetodo");


$app->run();
