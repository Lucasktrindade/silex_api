<?php

namespace Game\Controllers;

use Game\Repository\PerguntaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 25/10/2016
 * Time: 16:57
 */

class PerguntaController
{
    protected $repo;

    public function __construct(PerguntaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function PerguntaAll()
    {
        return new JsonResponse($this->repo->findAll());
    }
    public function PerguntabyId($id)
    {
        $data = $this->repo->findById($id);

        if($data != null)
            return new JsonResponse($data);
        else
            return new JsonResponse("Objeto não encontrado", 404);
    }
    public function PerguntaAdd(Request $request)
    {
        $data = array('texto' => $request->request->get("texto"));
        $data = $this->repo->store($data);
        if($data != null)
            return new JsonResponse($data,201);
        else
            return new JsonResponse("Objeto não adicionado",400);
    }

    public function PerguntaDelete($id)
    {
        $data = $this->repo->delete($id);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não encontrado",400);
    }

    public function PerguntaUpdate(Request $request, $id)
    {
        $data = array('texto' => $request->request->get("texto"));
        $data = $this->repo->update($id,$data);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não atualizado",400);
    }

}