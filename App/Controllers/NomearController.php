<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Repositories\NomearRepository;

class NomearController {

    private mixed $container;
    
    //private NomearRepository $repository;

    public function __construct($container)
    {
        $this->container = $container;
        $this->repository = new NomearRepository();
    }


    public function nomeMetodoTexto(Request $request, Response $response, array $params){

	$response->getBody()->write("Hello!");

   	return $response;
    }
    
    public function nomeMetodoJson(Request $request, Response $response, array $params){
       
        $data = [
            "instituicao" => "IFPR",
            "endereco" => "Avenida Araucária, 780, Bairro Vila A – CEP: 85860-000 – Foz do Iguaçu – Paraná"
        ];


        return $response->withJson($data);
       
    }
}
