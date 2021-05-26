<?php

namespace Enbit\GLS\Interfaces;

interface Request
{
    public function getMethod(): string;

    public function getEndpoint(): string;

    public function makeResponse(?array $data): Response;

    public function toArray(): array;
}
