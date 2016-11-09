<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 27/10/2016
 * Time: 20:00
 */

namespace Game\model;


use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = ['nome','profissao_desejada','email','data_nascimento','sexo','escolaridade','telefone','pontuacao'];
    protected $table = 'partida';

    public function perguntas()
    {
        return $this->belongsToMany(Pergunta::class);
    }
}