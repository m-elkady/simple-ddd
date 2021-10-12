<?php

namespace App\Response;

use App\Entity\Invoice;

class AddInvoiceResponse extends AbstractResponse
{
    public Invoice $invoice;
}