<?php

namespace App\Repository;

use App\Entity\Company;
use App\Request\AddCompanyRequest;

class CompanyRepository
{

    public function save(AddCompanyRequest $request): Company
    {
        $company = new Company();
        $company->setName($request->name);

        return $company;
    }

}