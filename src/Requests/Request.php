<?php

namespace Enbit\GLS\Requests;

use Enbit\GLS\Interfaces\Request as RequestContract;

abstract class Request implements RequestContract
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $method = 'POST';

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
