<?php

namespace App\Controller;

use App\Request\AddCompanyRequest;
use App\Service\CompanyService;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends AbstractController
{
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function add(Request $request)
    {
        $addCompanyRequest = $this->getRequest($request, AddCompanyRequest::class);
        return $this->returnResponse($this->companyService->add($addCompanyRequest));
    }



}