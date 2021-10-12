<?php

namespace App\Service;

use App\Repository\InvoiceRepository;
use App\Request\AddInvoiceRequest;
use App\Response\AddInvoiceResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceService
{
    /**
     * @var InvoiceRepository
     */
    private InvoiceRepository $repository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->repository= $invoiceRepository;
    }

    public function add(AddInvoiceRequest $addInvoiceRequest): AddInvoiceResponse
    {
        $invoice = $this->repository->save($addInvoiceRequest);

        if (!$invoice) {
            throw new NotFoundHttpException('Saving Company Error');
        }

        $response = new AddInvoiceResponse();
        $response->message =  "Added successfully";
        $response->invoice = $invoice;
        return $response;
    }
}