<?php

namespace Enbit\GLS\Models;

class ParcelInfo
{
    /**
     * @var string
     */
    protected $parcelNumber;

    /**
     * @var string
     */
    protected $trackingNumber;

    /**
     * @var string
     */
    protected $trackingUrl;

    public function __construct(string $parcelNumber, string $trackingNumber, ?string $trackingUrl = null)
    {
        $this->parcelNumber = $parcelNumber;
        $this->trackingNumber = $trackingNumber;
        $this->trackingUrl = $trackingUrl;
    }

    /**
     * @return string
     */
    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    /**
     * @return string
     */
    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    /**
     * @return string
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }
}
