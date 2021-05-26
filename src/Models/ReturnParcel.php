<?php

namespace Enbit\GLS\Models;

class ReturnParcel
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

    public function toArray(): array
    {
        return array_filter([
            'weight' => $this->getWeight(),
            'references' => $this->getReferences(),
        ]);
    }
}
