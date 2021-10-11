<?php

namespace App\Entity;

class Invoice
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string $item
     */
    private $item;

    /**
     * @var CompanyDebitor
     */
    private $companyDebitor;

    /**
     * @return int
     */
    public function getId()
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
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem(string $item): void
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getCompanyDebitor(): CompanyDebitor
    {
        return $this->companyDebitor;
    }

    /**
     * @param mixed $companyDebitor
     */
    public function setCompanyDebitor(CompanyDebitor $companyDebitor): void
    {
        $this->companyDebitor = $companyDebitor;
    }

}