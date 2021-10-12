<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class AddCompanyRequest extends AbstractRequest
{
    public string $name;

    public float $limit;

    /**
     * Get Validation Rules for each request
     * @return Assert\Collection
     */
    function getConstrains(): Assert\Collection
    {
        return new Assert\Collection([
            'fields' => [
                'name' => [new Assert\NotBlank(), new Assert\NotNull()],
                'limit' => [new Assert\NotBlank(), new Assert\NotNull(), new Assert\Positive()],
            ],
            'allowExtraFields' => true,
        ]);
    }

}