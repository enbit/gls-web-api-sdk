<?php

namespace Enbit\GLS\Services;



/**
 * InterCompany Service.
 */
class InterCompany extends Service
{
    protected static $serviceName = 'intercompanyservice';

    /**
     * @var string|null
     */
    protected $returnOnly;

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

    protected function getInfo(): array
    {
        if($this->getReturnOnly()){
            $this->infos[] = [
                'name'  => 'returnonly',
                'value' =>  $this->getReturnOnly(),
            ];
        }

        return parent::getInfo();
    }
}
