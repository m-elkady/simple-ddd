<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class AddCompanyRequest extends AbstractRequest
{
     public string $name;

     public string $url;

    function getConstrains(): Assert\Collection
    {
        return new Assert\Collection([
            'fields' => [
                'name' => [new Assert\NotBlank(), new Assert\NotNull()],
            ],
            'allowExtraFields' => true,

        ]);
    }

    /**
     * @return Request
     * @throws BadRequestHttpException
     */
    public function validate(): bool
    {
        $validator = Validation::createValidator();
        $errors = $validator->validate((array)$this , $this->getConstrains());
        if (count($errors)) {
            throw new BadRequestHttpException($this->getValidationErrors($errors));
        }
        return true;
    }
}