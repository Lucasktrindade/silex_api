<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 27/10/2016
 * Time: 19:38
 */

namespace Game\model;


use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{

    protected $fillable = ['e_correta','texto','pergunta_id'];
    public $timestamps = false;
    protected $table = 'alternativas';

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
}