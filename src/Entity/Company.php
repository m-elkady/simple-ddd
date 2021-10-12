<?php

namespace App\Entity;

class Company
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $limit;

    /**
     * @var array
     */
    private array $debitors = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param float $limit
     */
    public function setLimit(float $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return float
     */
    public function getLimit(): float
    {
        return $this->limit;
    }

    /**
     * @param Debitor $debitor
     */
    public function addDebitor(Debitor $debitor): void
    {
        $this->debitors[] = $debitor;
    }

    /**
     * @return array
     */
    public function getDebitors(): array
    {
        return $this->debitors;
    }

}