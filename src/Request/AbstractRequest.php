<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

abstract class AbstractRequest extends \App\Request\AddInvoiceRequest
{
    public function getValidationErrors($errors): string
    {
        $errs = [];
        /** @var ConstraintViolation $error */
        foreach ($errors as $error) {
            $errs[$error->getPropertyPath()] = $error->getMessage();
        }

        return json_encode($errs);
    }

    /**
     * @return bool
     * @throws BadRequestHttpException
     */
    public function validate(): bool
    {
        $validator = Validation::createValidator();
        $errors = $validator->validate((array)$this, $this->getConstrains());

        if (count($errors)) {
            // Todo: Need to be refactored to our Exception Handlers
            throw new BadRequestHttpException($this->getValidationErrors($errors), code: 400);
        }
        return true;
    }
}