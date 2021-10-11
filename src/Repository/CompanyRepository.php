<?php

namespace App\Repository;

use App\Entity\Company;

class CompanyRepository extends AbstractRepository
{

    public function save($request): Company
    {
        $company = new Company();
        $company->setName($request->get('name'));

        return $company;
    }

}