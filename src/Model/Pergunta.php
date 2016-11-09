<?php

namespace Game\model;
use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 25/10/2016
 * Time: 16:38
 */

class Pergunta extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = ['texto'];
    public $timestamps = false;
    protected $table = 'perguntas';

    public function partidas()
    {
        return $this->belongsToMany(Partida::class);
    }

    public function alternativas()
    {
        return $this->hasMany(Alternativa::class);
    }

}