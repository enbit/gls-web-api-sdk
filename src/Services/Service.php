<?php

namespace Enbit\GLS\Services;

abstract class Service
{
    /**
     * @var string
     */
    protected static $serviceName;
    /**
     * @var array
     */
    protected $infos = [];

    protected function getInfo(): array
    {
        return $this->infos;
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => static::$serviceName,
            'infos' => $this->getInfo(),
        ]);
    }
}
