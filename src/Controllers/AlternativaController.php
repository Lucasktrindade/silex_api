<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 23/11/2016
 * Time: 11:13
 */

namespace Game\Controllers;


use Game\Repository\AlternativaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AlternativaController
{
    protected $repo;

    public function __construct(AlternativaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AlternativaAll()
    {
        return new JsonResponse($this->repo->findAll());
    }
    public function AlternativabyId($id)
    {
        $data = $this->repo->findById($id);

        if($data != null)
            return new JsonResponse($data);
        else
            return new JsonResponse("Objeto não encontrado", 404);
    }
    public function AlternativaAdd(Request $request)
    {
        $data = array('e_correta' => $request->request->get("e_correta"), 'texto' => $request->request->get('texto'), 'pergunta_id' => $request->request->get('pergunta_id'));
        $data = $this->repo->store($data);
        if($data != null)
            return new JsonResponse($data,201);
        else
            return new JsonResponse("Objeto não adicionado",400);
    }

    public function AlternativaDelete($id)
    {
        $data = $this->repo->delete($id);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não encontrado",400);
    }

    public function AlternativaUpdate(Request $request, $id)
    {
        $data = array('e_correta' => $request->request->get("e_correta"), 'texto' => $request->request->get('texto'));
        $data = $this->repo->update($id,$data);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não atualizado",400);
    }
}