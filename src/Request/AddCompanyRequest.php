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
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    function getConstrains(): Assert\Collection
    {
        return new Assert\Collection([
            'name' => [new Assert\NotBlank(), new Assert\NotBlank()],
        ]);
    }

    /**
     * @return Request
     * @throws BadRequestHttpException
     */
    public function validate(): Request
    {
        $validator = Validation::createValidator();
        $errors = $validator->validate($this->request->toArray(), $this->getConstrains());
        if (count($errors)) {
            throw new BadRequestHttpException($this->getValidationErrors($errors));
        }

        return $this->request;
    }
}