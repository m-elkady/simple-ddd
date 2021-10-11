<?php

namespace App\Controller;

use App\Request\AddCompanyRequest;
use App\Service\CompanyService;
use Symfony\Component\HttpFoundation\Request;

class CompaniesController extends AbstractController
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
        $rq = $this->getRequest($request, AddCompanyRequest::class);
        return $this->returnResponse($this->companyService->add($rq),'php');
    }



}