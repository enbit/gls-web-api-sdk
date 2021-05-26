<?php

namespace Enbit\GLS\Interfaces;

interface Address
{
    public function name(): string;

    public function street(): string;

    public function houseNumber(): ?string;

    public function houseNumberInfo(): ?string;

    public function city(): string;

    public function zipCode(): string;

    public function countryIsoCode(): string;

    public function toArray(): array;
}
