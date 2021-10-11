<?php

namespace App\Controller;

use App\Request\AddCompanyRequest;
use App\Service\CompanyService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;

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

    public function add(Request $request): JsonResponse
    {
        return $this->json($this->companyService->add($request));
    }



}