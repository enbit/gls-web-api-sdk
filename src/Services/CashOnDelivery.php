<?php

namespace Enbit\GLS\Services;

/**
 * CashOnDelivery Service.
 */
class CashOnDelivery extends Service
{
    protected static $serviceName = 'cashondelivery';

    /**
     * @var float
     */
    protected $amount;
    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getInfo(): array
    {
        $this->infos[] = [
            'name'  => 'amount',
            'value' =>  $this->getAmount(),
        ];

        if($this->getReference()){
            $this->infos[] = [
                'name'  => 'reference',
                'value' =>  $this->getReference(),
            ];
        }

        return parent::getInfo();
    }
}
