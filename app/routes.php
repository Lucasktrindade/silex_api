<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 28/10/2016
 * Time: 17:27
 */

use Game\Repository\PerguntaRepository;
use Game\Controllers\PerguntaController;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;

$app['pergunta.repository'] = function() {
    return new PerguntaRepository;
};
$app['pergunta.controller'] = function() use ($app) {
    return new PerguntaController($app['pergunta.repository']);
};

$app->error(function (\Exception $e, Request $request, $code) {
    return new Response('Não encontrado',404);
});

$app->get("/perguntas", "pergunta.controller:PerguntaAll");
$app->get('/pergunta/{id}', "pergunta.controller:PerguntabyId");
$app->post("/pergunta", "pergunta.controller:PerguntaAdd");
$app->delete('/pergunta/{id}', "pergunta.controller:PerguntaDelete");
$app->put('/pergunta/{id}', "pergunta.controller:PerguntaUpdate");