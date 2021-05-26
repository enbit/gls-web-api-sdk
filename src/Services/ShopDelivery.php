<?php

namespace Enbit\GLS\Services;



/**
 * CashOnDelivery Service.
 */
class ShopDelivery extends Service
{
    protected static $serviceName = 'shopdeliveryservice';

    /**
     * @var string|null
     */
    protected $parcelShopId;
    /**
     * @var string|null
     */
    protected $directShop;

    /**
     * @return string|null
     */
    public function getParcelShopId(): ?string
    {
        return $this->parcelShopId;
    }

    /**
     * @param string|null $parcelShopId
     */
    public function setParcelShopId(?string $parcelShopId): void
    {
        $this->parcelShopId = $parcelShopId;
    }

    /**
     * @return string|null
     */
    public function getDirectShop(): ?string
    {
        return $this->directShop;
    }

    /**
     * @param bool|null $directShop
     */
    public function setDirectShop(?bool $directShop): void
    {
        $this->directShop = $directShop ? 'Y' : '';
    }

    protected function getInfo(): array
    {
        if($this->getParcelShopId()){
            $this->infos[] = [
                'name'  => 'parcelshopid',
                'value' =>  $this->getParcelShopId(),
            ];
        }

        if($this->getDirectShop()){
            $this->infos[] = [
                'name'  => 'directshop',
                'value' =>  $this->getDirectShop(),
            ];
        }

        return parent::getInfo();
    }
}
