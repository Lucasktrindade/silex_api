<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 27/10/2016
 * Time: 19:59
 */

namespace Game\model;


use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $fillable = ['nome','profissao_desejada','email','data_nascimento','sexo','escolaridade','telefone','pontuacao'];
    protected $table = 'pessoa';



}