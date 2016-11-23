<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 28/10/2016
 * Time: 17:27
 */

use Game\Repository\PerguntaRepository;
use Game\Controllers\PerguntaController;
use Game\Repository\AlternativaRepository;
use Game\Controllers\AlternativaController;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;

$app['pergunta.repository'] = function() {return new PerguntaRepository;};
$app['pergunta.controller'] = function() use ($app) {return new PerguntaController($app['pergunta.repository']);};

$app['alternativa.repository'] = function() {return new AlternativaRepository;};
$app['alternativa.controller'] = function() use ($app) {return new AlternativaController($app['alternativa.repository']);};

$app->error(function (\Exception $e, Request $request, $code) {
    return new Response($e,$code);
});

$app->get("/perguntas", "pergunta.controller:PerguntaAll");
$app->get('/pergunta/{id}', "pergunta.controller:PerguntabyId");
$app->get('/pergunta/{id}/alternativas', "pergunta.controller:Alternativas");
$app->post("/pergunta", "pergunta.controller:PerguntaAdd");
$app->delete('/pergunta/{id}', "pergunta.controller:PerguntaDelete");
$app->put('/pergunta/{id}', "pergunta.controller:PerguntaUpdate");

$app->get("/alternativas", "alternativa.controller:AlternativaAll");
$app->get('/alternativa/{id}', "alternativa.controller:AlternativabyId");
$app->post("/alternativa", "alternativa.controller:AlternativaAdd");
$app->delete('/alternativa/{id}', "alternativa.controller:AlternativaDelete");
$app->put('/alternativa/{id}', "alternativa.controller:AlternativaUpdate");
