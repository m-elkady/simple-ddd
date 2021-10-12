<?php

namespace App\Controller;

use App\Request\AddInvoiceRequest;
use App\Service\InvoiceService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends AbstractController
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function add(Request $request): JsonResponse|Response
    {
        $addInvoiceRequest = $this->getRequest($request, AddInvoiceRequest::class);
        return $this->returnResponse($this->invoiceService->add($addInvoiceRequest));
    }

}