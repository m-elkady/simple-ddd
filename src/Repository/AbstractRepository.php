<?php

namespace App\Repository;

class AbstractRepository
{

    public function toArray($entity): array
    {
        $obj= new \stdClass();
        foreach ((array) $entity as $key => $value){
            dd($key, $value);
            $obj->{$key} = $value;
        }
        dd($obj);
    }

}