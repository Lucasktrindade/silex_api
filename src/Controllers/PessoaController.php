<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 23/11/2016
 * Time: 15:52
 */

namespace Game\Controllers;


use Game\Repository\PessoaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PessoaController
{
    protected $repo;

    public function __construct(PessoaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function PessoaAll()
    {
        return new JsonResponse($this->repo->findAll());
    }
    public function PessoabyId($id)
    {
        $data = $this->repo->findById($id);

        if($data != null)
            return new JsonResponse($data);
        else
            return new JsonResponse("Objeto não encontrado", 404);
    }
    public function PessoaAdd(Request $request)
    {
        $data = array(
            'nome' => $request->request->get("nome"),
            'profissao_desejada' => $request->request->get("profissao_desejada"),
            'email' => $request->request->get("email"),
            'data_nascimento' => $request->request->get("data_nascimento"),
            'escolaridade' => $request->request->get("escolaridade"),
            'sexo' => $request->request->get("sexo"),
            'telefone' => $request->request->get("telefone"),
        );
        $data = $this->repo->store($data);
        if($data != null)
            return new JsonResponse($data,201);
        else
            return new JsonResponse("Objeto não adicionado",400);
    }

    public function PessoaDelete($id)
    {
        $data = $this->repo->delete($id);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não encontrado",400);
    }

    public function PessoaUpdate(Request $request, $id)
    {
        $data = array(
            'nome' => $request->request->get("nome"),
            'profissao_desejada' => $request->request->get("profissao_desejada"),
            'email' => $request->request->get("email"),
            'data_nascimento' => $request->request->get("data_nascimento"),
            'escolaridade' => $request->request->get("escolaridade"),
            'sexo' => $request->request->get("sexo"),
            'telefone' => $request->request->get("telefone"),
        );
        $data = $this->repo->update($id,$data);
        if($data != null)
            return new JsonResponse($data,200);
        else
            return new JsonResponse("Objeto não atualizado",400);
    }
}