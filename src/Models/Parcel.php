<?php

namespace Enbit\GLS\Models;

use Enbit\GLS\Services\Service;

class Parcel
{
    /**
     * @var float
     */
    protected $weight;

    /**
     * @var array|null
     */
    protected $references;

    /**
     * @var string|null
     */
    protected $comment;

    /**
     * @var Service[]
     */
    protected $services = [];

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return array|null
     */
    public function getReferences(): ?array
    {
        return $this->references;
    }

    /**
     * @param array|null $references
     */
    public function setReferences(?array $references): void
    {
        $this->references = $references;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return Service[]
     */
    public function getServices(): ?array
    {
        return $this->services;
    }

    /**
     * @param Service[] $services
     * @return Parcel
     */
    public function setServices(array $services): void
    {
        $this->services = $services;
    }

    public function addService(Service $service): void
    {
        $this->services[] = $service;
    }

    public function toArray(): array
    {
        return array_filter([
            'weight' => $this->getWeight(),
            'references' => $this->getReferences(),
            'comment' => $this->getComment(),
            'services' => $this->formatServices(),
        ]);
    }

    protected function formatServices(): array
    {
        return array_map(function ($service) {
            return $service->toArray();
        }, $this->services);
    }
}
