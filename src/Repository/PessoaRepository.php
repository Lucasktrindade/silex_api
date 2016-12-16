<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 23/11/2016
 * Time: 15:46
 */

namespace Game\Repository;


use Game\model\Pessoa;

class PessoaRepository extends BaseRepository
{
    protected $modelClass = Pessoa::class;

    public function findByEmail($email)
    {
        return $this->getEntity()->select()->where('email', '=', $email)->first();
    }
}