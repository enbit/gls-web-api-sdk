<?php

namespace Enbit\GLS\Interfaces;

use Enbit\GLS\ErrorCollection;

interface Response
{
    public function data(): ?array;

    public function isSuccess(): bool;

    public function errors(): ?ErrorCollection;
}
