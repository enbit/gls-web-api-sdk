<?php

namespace Enbit\GLS\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

class RequestException extends Exception
{
    /**
     * The response instance.
     *
     * @var ResponseInterface
     */
    public $response;

    public function __construct(ResponseInterface $response)
    {
        parent::__construct("HTTP request returned status code {$response->getStatusCode()}.", $response->getStatusCode() . "\n\n\n" . $response->getBody()->getContents());

        $this->response = $response;
    }
}
