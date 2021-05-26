<?php

namespace Enbit\GLS\Services;



/**
 * ShopReturn Service.
 */
class ShopReturn extends Service
{
    protected static $serviceName = 'shopreturnservice';

    /**
     * @var string|null
     */
    protected $returnOnly;

    /**
     * @var bool
     */
    protected $withGrCode;

    /**
     * @var string
     */
    protected static $qrCode = 'QRCODE4';

    /**
     * @return string|null
     */
    public function getReturnOnly(): ?string
    {
        return $this->returnOnly;
    }

    /**
     * @param bool|null $directShop
     */
    public function setReturnOnly(?bool $returnOnly): void
    {
        $this->returnOnly = $returnOnly ? 'Y' : '';
    }

    /**
     * @return bool
     */
    public function isWithGrCode(): bool
    {
        return $this->withGrCode;
    }

    /**
     * @param bool $withGrCode
     */
    public function setWithGrCode(bool $withGrCode): void
    {
        $this->withGrCode = $withGrCode;
    }

    protected function getInfo(): array
    {
        if($this->getReturnOnly()){
            $this->infos[] = [
                'name'  => 'returnonly',
                'value' =>  $this->getReturnOnly(),
            ];
        }

        if($this->isWithGrCode()){
            $this->infos[] = [
                'name'  => 'qrcode',
                'value' =>  self::$qrCode,
            ];
        }

        return parent::getInfo();
    }
}
