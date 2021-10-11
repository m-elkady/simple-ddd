<?php

namespace App\Service;

use App\Repository\CompanyRepository;
use App\Request\AddCompanyRequest;
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
    function add(Request $request): array
    {
        $request = (new AddCompanyRequest($request))->validate();
        $company = $this->repository->save($request);

        if (!$company) {
            throw new NotFoundHttpException('Saving Company Error');
        }

        return ['message' => 'Added successfully', 'company' => $company];
    }

}