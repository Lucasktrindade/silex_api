<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 28/10/2016
 * Time: 18:52
 */

namespace Game\Repository;

abstract class BaseRepository
{
    protected $modelClass;

    protected function getEntity()
    {
        return new $this->modelClass;
    }

    public function findAll()
    {
        return $this->getEntity()->all();
    }

    public function findById($id)
    {
        return $this->getEntity()->find($id);
    }

    public function store($data)
    {
        return $this->getEntity()->create($data);
    }

    public function delete($id)
    {
        return $this->getEntity()->destroy($id);
    }

    public function update($id,$data)
    {

        return $this->findById($id)->update($data);
    }
}