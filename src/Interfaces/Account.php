<?php

namespace Enbit\GLS\Interfaces;

interface Account
{
    public function apiURL(): string;

    public function userName(): string;

    public function password(): string;

    public function customerID(): string;

    public function contactId(): string;

    public function shipperID(): string;

    public function langCode(): string;
}
