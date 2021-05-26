<?php

namespace Enbit\GLS\Services;



/**
 * deliveryAtWork Service.
 */
class deliveryAtWork extends Service
{
    protected static $serviceName = 'deliveryatworkservice';

    /**
     * @var string
     */
    protected $phone;
    /**
     * @var string
     */
    protected $recipientName;
    /**
     * @var string
     */
    protected $building;
    /**
     * @var string
     */
    protected $floor;
    /**
     * @var string|null
     */
    protected $roomNumber;
    /**
     * @var string|null
     */
    protected $alternativeRecipient;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getRecipientName(): string
    {
        return $this->recipientName;
    }

    /**
     * @param string $recipientName
     */
    public function setRecipientName(string $recipientName): void
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * @param string $building
     */
    public function setBuilding(string $building): void
    {
        $this->building = $building;
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }

    /**
     * @param string $floor
     */
    public function setFloor(string $floor): void
    {
        $this->floor = $floor;
    }

    /**
     * @return string|null
     */
    public function getRoomNumber(): ?string
    {
        return $this->roomNumber;
    }

    /**
     * @param string|null $roomNumber
     */
    public function setRoomNumber(?string $roomNumber): void
    {
        $this->roomNumber = $roomNumber;
    }

    /**
     * @return string|null
     */
    public function getAlternativeRecipient(): ?string
    {
        return $this->alternativeRecipient;
    }

    /**
     * @param string|null $alternativeRecipient
     */
    public function setAlternativeRecipient(?string $alternativeRecipient): void
    {
        $this->alternativeRecipient = $alternativeRecipient;
    }

    protected function getInfo(): array
    {
        $this->infos[] = [
            'name'  => 'phone',
            'value' =>  $this->getPhone(),
        ];

        $this->infos[] = [
            'name'  => 'recipientname',
            'value' =>  $this->getRecipientName(),
        ];

        $this->infos[] = [
            'name'  => 'building',
            'value' =>  $this->getBuilding(),
        ];

        $this->infos[] = [
            'name'  => 'floor',
            'value' =>  $this->getFloor(),
        ];

        if($this->getRoomNumber()){
            $this->infos[] = [
                'name'  => 'roomnumber',
                'value' =>  $this->getRoomNumber(),
            ];
        }

        if($this->getAlternativeRecipient()){
            $this->infos[] = [
                'name'  => 'alternativerecipient',
                'value' =>  $this->getAlternativeRecipient(),
            ];
        }

        return parent::getInfo();
    }
}
