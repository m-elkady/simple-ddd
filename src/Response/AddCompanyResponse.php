<?php

namespace App\Response;

use App\Entity\Company;

class AddCompanyResponse extends AbstractResponse
{
    public Company $company;
}