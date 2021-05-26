<?php

namespace Enbit\GLS\Models;

class ErrorInfo
{
    /**
     * @var array
     */
    protected $error;

    public function __construct(array $error)
    {
        $this->error = $error;
    }

    public function code(): string
    {
        return $this->error['exitCode'];
    }

    public function message(): string
    {
        return $this->error['exitMessage'];
    }

    public function description(): string
    {
        return $this->error['description'];
    }

    public function toArray(): array
    {
        return $this->error;
    }
}
