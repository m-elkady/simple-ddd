<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class AddInvoiceRequest extends AbstractRequest
{
    public string $itemName;

    public float $amount;

    public int $companyId;

    public int $debitorId;

    /**
     * Get Validation Rules for each request
     * @return Assert\Collection
     */
    function getConstrains(): Assert\Collection
    {
        return new Assert\Collection([
            'fields' => [
                'itemName' => [new Assert\NotBlank(), new Assert\NotNull()],
                'amount' => [new Assert\NotBlank(), new Assert\NotNull(), new Assert\Positive()],
                'companyId' => [new Assert\NotBlank(), new Assert\NotNull()],
                'debitorId' => [new Assert\NotBlank(), new Assert\NotNull()],
            ],
            'allowExtraFields' => true,
        ]);
    }

}