<?php

namespace Enbit\GLS\Services;



/**
 * IdetPin Service.
 */
class IdetPin extends Service
{
    protected static $serviceName = 'identpinservice';

    /**
     * @var string
     */
    protected $pin;
    /**
     * @var \DateTime|null
     */
    protected $birthdate;

    /**
     * @return string
     */
    public function getPin(): string
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     */
    public function setPin(string $pin): void
    {
        $this->pin = $pin;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthdate(): ?\DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime|null $birthdate
     */
    public function setBirthdate(?\DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    protected function getInfo(): array
    {
        $this->infos[] = [
            'name'  => 'pin',
            'value' =>  $this->getPin(),
        ];

        if($this->getBirthdate()){
            $this->infos[] = [
                'name'  => 'birthdate',
                'value' =>  $this->getBirthdate()->format('d/m/Y'),
            ];
        }

        return parent::getInfo();
    }
}
