<?php

namespace App\Entity;

class Invoice
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string $item
     */
    private string $item;

    /**
     * @var int $companyId
     */
    private int $companyId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param string $item
     */
    public function setItem(string $item): void
    {
        $this->item = $item;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }


    /**
     * @return int
     */
    public function getDebitorId(): int
    {
        return $this->debitorId;
    }

    /**
     * @param int $debitorId
     */
    public function setDebitorId(int $debitorId): void
    {
        $this->debitorId = $debitorId;
    }

}