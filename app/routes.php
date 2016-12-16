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
use Game\Repository\PartidaRepository;
use Game\Controllers\PartidaController;
use Game\Controllers\AuthController;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Firebase\JWT\JWT;

$jwtVerify = function (Request $request) {
    $secretKey = base64_decode('stringsecreta');
    $jwt = $request->headers->get('x-access-token');

    if($jwt){
        try{
            $token = JWT::decode($jwt, $secretKey, array('HS512'));
            $request->attributes->set('uid', $token->data->uid);
        } catch (Exception $e){
            return new Response($e->getMessage(),401);
        }
    } else{
        return new Response("Token not found in request", 400);
    }

};
$app->error(function (\Exception $e, Request $request, $code) {
    return new Response($e,$code);
});

$app->get("/", function(Request $request){
     return new JsonResponse();
});

$app['pergunta.repository'] = function() {return new PerguntaRepository;};
$app['alternativa.repository'] = function() {return new AlternativaRepository;};
$app['pessoa.repository'] = function() {return new PessoaRepository;};
$app['partida.repository'] = function() {return new PartidaRepository;};
$app['pergunta.controller'] = function() use ($app) {return new PerguntaController($app['pergunta.repository']);};
$app['alternativa.controller'] = function() use ($app) {return new AlternativaController($app['alternativa.repository']);};
$app['pessoa.controller'] = function() use ($app) {return new PessoaController($app['pessoa.repository']);};
$app['partida.controller'] = function() use ($app) {return new PartidaController($app['partida.repository']);};
$app['auth.controller'] = function() use ($app) {return new AuthController($app['pessoa.repository']);};

$app->get("/perguntas", "pergunta.controller:PerguntaAll")->before($jwtVerify);
$app->get('/perguntas/{id}', "pergunta.controller:PerguntabyId")->before($jwtVerify);
$app->get('/perguntas/{id}/alternativas', "pergunta.controller:Alternativas")->before($jwtVerify);
$app->delete('/perguntas/{id}', "pergunta.controller:PerguntaDelete")->before($jwtVerify);
$app->post("/perguntas", "pergunta.controller:PerguntaAdd")->before($jwtVerify);
$app->put('/perguntas/{id}', "pergunta.controller:PerguntaUpdate")->before($jwtVerify);

$app->get("/alternativas", "alternativa.controller:AlternativaAll")->before($jwtVerify);
$app->get('/alternativas/{id}', "alternativa.controller:AlternativabyId")->before($jwtVerify);
$app->delete('/alternativas/{id}', "alternativa.controller:AlternativaDelete")->before($jwtVerify);
$app->post("/alternativas", "alternativa.controller:AlternativaAdd")->before($jwtVerify);
$app->put('/alternativas/{id}', "alternativa.controller:AlternativaUpdate")->before($jwtVerify);

$app->get("/pessoas", "pessoa.controller:PessoaAll")->before($jwtVerify);
$app->get('/pessoas/{id}', "pessoa.controller:PessoabyId")->before($jwtVerify);
$app->delete('/pessoas/{id}', "pessoa.controller:PessoaDelete")->before($jwtVerify);
$app->post("/pessoas", "pessoa.controller:PessoaAdd");
$app->put('/pessoas/{id}', "pessoa.controller:PessoaUpdate")->before($jwtVerify);

$app->get("/partidas", "partida.controller:PartidaAll")->before($jwtVerify);
$app->get('/partidas/{id}', "partida.controller:PartidabyId")->before($jwtVerify);
$app->delete('/partidas/{id}', "partida.controller:PartidaDelete")->before($jwtVerify);
$app->post("/partidas", "partida.controller:PartidaAdd")->before($jwtVerify);
$app->put('/partidas/{id}', "partida.controller:PartidaUpdate")->before($jwtVerify);

$app->post("/authenticate", "auth.controller:Authenticate");

