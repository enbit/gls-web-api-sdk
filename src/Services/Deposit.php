<?php

namespace Enbit\GLS\Services;



/**
 * Deposit Service.
 */
class Deposit extends Service
{
    protected static $serviceName = 'depositservice';

    /**
     * @var string|null
     */
    protected $placeOfDeposit;
    /**
     * @var string|null
     */
    protected $contact;
    /**
     * @var string|null
     */
    protected $phone;

    /**
     * @return string|null
     */
    public function getPlaceOfDeposit(): ?string
    {
        return $this->placeOfDeposit;
    }

    /**
     * @param string|null $placeOfDeposit
     */
    public function setPlaceOfDeposit(?string $placeOfDeposit): void
    {
        $this->placeOfDeposit = $placeOfDeposit;
    }

    /**
     * @return string|null
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }

    /**
     * @param string|null $contact
     */
    public function setContact(?string $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    protected function getInfo(): array
    {
        if($this->getPlaceOfDeposit()){
            $this->infos[] = [
                'name'  => 'placeofdeposit',
                'value' =>  $this->getPlaceOfDeposit(),
            ];
        }

        if($this->getContact()){
            $this->infos[] = [
                'name'  => 'contact',
                'value' =>  $this->getContact(),
            ];
        }

        if($this->getPhone()){
            $this->infos[] = [
                'name'  => 'phone',
                'value' =>  $this->getPhone(),
            ];
        }

        return parent::getInfo();
    }
}
