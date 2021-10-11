<?php

namespace App\Service;

use App\Repository\CompanyRepository;
use App\Request\AddCompanyRequest;
use App\Response\AddCompanyResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompanyService
{

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->repository = $companyRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    function add(AddCompanyRequest $request): AddCompanyResponse
    {
        $company = $this->repository->save($request);

        if (!$company) {
            throw new NotFoundHttpException('Saving Company Error');
        }
        $res = new AddCompanyResponse();
        $res->message =  "Added successfully";
        $res->company = $company;
        return $res;
    }

}