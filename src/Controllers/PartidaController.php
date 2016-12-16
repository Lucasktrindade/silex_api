<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 23/11/2016
 * Time: 19:37
 */

namespace Game\Controllers;

use Game\Repository\PartidaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PartidaController
{
    protected $repo;

    public function __construct(PartidaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function PartidaAll()
    {
        return new JsonResponse($this->repo->findAll());
    }
    public function PartidabyId($id)
    {
        $data = $this->repo->findById($id);

        if($data != null)
            return new JsonResponse($data);
        else
            return new JsonResponse("Objeto não encontrado", 404);
    }
    public function PartidaAdd(Request $request)
    {
        $data = array(
            'pontuacao' => $request->request->get("pontuacao"),
            'pessoa_id' => $request->request->get("pessoa_id"),
        );
        $data = $this->repo->store($data);
        if($data != null)
            return new JsonResponse($data,201);
        else
            return new JsonResponse("Objeto não adicionado",400);
    }

    public function PartidaDelete($id)
    {
        $data = $this->repo->delete($id);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não encontrado",400);
    }

    public function PartidaUpdate(Request $request, $id)
    {
        $data = array(
            'pontuacao' => $request->request->get("pontuacao"),
            'pessoa_id' => $request->request->get("pessoa_id"),
        );
        $data = $this->repo->update($id,$data);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não atualizado",400);
    }
}