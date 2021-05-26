<?php

namespace Enbit\GLS\Services;



/**
 * express Service.
 */
class Express extends Service
{
    protected static $serviceName = 'express';

    /**
     * @var string|null
     */
    protected $deliveryTime;

    /**
     * @return string|null
     */
    public function getDeliveryTime(): ?string
    {
        return $this->deliveryTime;
    }

    /**
     * @param string|null $deliveryTime
     */
    public function setDeliveryTime(?string $deliveryTime): void
    {
        $this->deliveryTime = $deliveryTime;
    }

    protected function getInfo(): array
    {
        if($this->getDeliveryTime()){
            $this->infos[] = [
                'name'  => 'deliverytime',
                'value' =>  $this->getDeliveryTime(),
            ];
        }

        return parent::getInfo();
    }
}
