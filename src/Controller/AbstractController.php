<?php

namespace App\Controller;
use App\Request\AbstractRequest;
use App\Serializer\CustomNamingConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class AbstractController extends SymfonyController
{

    public function getRequest(Request $request, string $requestClass): AbstractRequest
    {
        $requestBody = $request->getContent();
        $parameters = json_decode($requestBody, true);
        $normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        /**
         * @var $request AbstractRequest
         */
        $request = $normalizer->denormalize($parameters, $requestClass);
        $request->validate();
        return $request;
    }

    protected function returnResponse($response, string $format = 'json'): JsonResponse|Response
    {
        if ($format == 'json')
        {
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $responseNormalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
            $normalizers = [$responseNormalizer];
            $serializer = new Serializer($normalizers, $encoders);
            $jsonContent = $serializer->serialize($response, 'json');
            return $this->json(json_decode($jsonContent, true));
        } elseif ($format == 'php')
        {
            return new Response(serialize($response), 200, ['Content-Type' => 'application/php']);
        }
        throw new Exception('Can´t build request object');
    }

}