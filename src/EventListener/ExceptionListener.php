<?php

namespace App\EventListener;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Throwable;


class ExceptionListener
{
    use LoggerAwareTrait;


    /**
     * ExceptionListener constructor.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->setLogger($logger);
    }

    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        $event->setResponse($this->getJsonResponse($exception));
        $this->logger->log(LogLevel::ERROR, $exception->getMessage());
    }

    private function getJsonResponse(Throwable $exception): JsonResponse
    {
        return new JsonResponse(
            [
                'message' => $exception->getMessage()],
            $exception->getCode()
        );
    }


}