<?php

namespace Enbit\GLS\Services;

/**
 * addOnLiability Service.
 */
class addOnLiability extends Service
{
    protected static $serviceName = 'addonliabilityservice';

    /**
     * @var string
     */
    protected $amount;

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    protected function getInfo(): array
    {
        $this->infos[] = [
            'name'  => 'amount',
            'value' =>  $this->getAmount(),
        ];

        return parent::getInfo();
    }
}
