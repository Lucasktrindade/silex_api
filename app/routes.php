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
use Game\Repository\PessoaRepository;
use Game\Controllers\PessoaController;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;

$app->error(function (\Exception $e, Request $request, $code) {
    return new Response($e,$code);
});

$app['pergunta.repository'] = function() {return new PerguntaRepository;};
$app['alternativa.repository'] = function() {return new AlternativaRepository;};
$app['pessoa.repository'] = function() {return new PessoaRepository;};
$app['pergunta.controller'] = function() use ($app) {return new PerguntaController($app['pergunta.repository']);};
$app['alternativa.controller'] = function() use ($app) {return new AlternativaController($app['alternativa.repository']);};
$app['pessoa.controller'] = function() use ($app) {return new PessoaController($app['pessoa.repository']);};

$app->get("/perguntas", "pergunta.controller:PerguntaAll");
$app->get('/pergunta/{id}', "pergunta.controller:PerguntabyId");
$app->get('/pergunta/{id}/alternativas', "pergunta.controller:Alternativas");
$app->delete('/pergunta/{id}', "pergunta.controller:PerguntaDelete");
$app->post("/pergunta", "pergunta.controller:PerguntaAdd");
$app->put('/pergunta/{id}', "pergunta.controller:PerguntaUpdate");

$app->get("/alternativas", "alternativa.controller:AlternativaAll");
$app->get('/alternativa/{id}', "alternativa.controller:AlternativabyId");
$app->delete('/alternativa/{id}', "alternativa.controller:AlternativaDelete");
$app->post("/alternativa", "alternativa.controller:AlternativaAdd");
$app->put('/alternativa/{id}', "alternativa.controller:AlternativaUpdate");

$app->get("/pessoas", "pessoa.controller:PessoaAll");
$app->get('/pessoa/{id}', "pessoa.controller:PessoabyId");
$app->delete('/pessoa/{id}', "pessoa.controller:PessoaDelete");
$app->post("/pessoa", "pessoa.controller:PessoaAdd");
$app->put('/pessoa/{id}', "pessoa.controller:PessoaUpdate");

