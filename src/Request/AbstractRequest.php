<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolation;

abstract class AbstractRequest
{
    abstract public function validate();

    public function getValidationErrors($errors): string
    {
        $errs= [];
        /** @var ConstraintViolation $error */
        foreach ($errors as $error){
            $errs[$error->getPropertyPath()] = $error->getMessage();
        }

        return json_encode($errs);
    }
}