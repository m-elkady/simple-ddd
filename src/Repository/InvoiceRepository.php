<?php

namespace App\Repository;

use App\Entity\Company;
use App\Entity\Debitor;
use App\Entity\Invoice;
use App\Request\AddInvoiceRequest;

class InvoiceRepository
{
    private Company $companyEntity;
    private Debitor $debitorEntity;

    public function __construct(Company $company, Debitor $debitorEntity)
    {
        $this->companyEntity = $company;
        $this->debitorEntity = $debitorEntity;
    }

    public function save(AddInvoiceRequest $request): Company
    {
        $company = $this->companyEntity->get($request->companyId);

        $invoice = new Invoice();
        $invoice->setItem($request->name);
        $invoice->setAmount($request->amount);


        $invoice->setCompanyId($request->companyId);
        $invoice->getDebitorId($request->debitorId);

        return $invoice;
    }
}