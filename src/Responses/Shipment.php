<?php

namespace Enbit\GLS\Responses;

use Enbit\GLS\Models\ParcelInfo;

class Shipment extends Response
{
    /**
     * @var string
     */
    protected $shipmentTrackingUrl;
    /**
     * @var string
     */
    protected $shipmentId;
    /**
     * @var ParcelInfo[]
     */
    protected $parcelsInfo = [];
    /**
     * @var ParcelInfo[]
     */
    protected $returnsInfo = [];

    /**
     * @return string
     */
    public function getShipmentTrackingUrl(): string
    {
        return $this->offsetGet('location');
    }

    /**
     * @return string
     */
    public function getShipmentId(): string
    {
        return $this->offsetGet('consignmentId');
    }

    /**
     * @return ParcelInfo[]
     */
    public function parcelsInfo(): array
    {
        if (! $this->parcelsInfo) {
            $this->buildParcelsInfoList();
        }

        return $this->parcelsInfo;
    }

    /**
     * @return ParcelInfo[]
     */
    public function returnsInfo(): array
    {
        if (! $this->returnsInfo) {
            $this->buildReturnsInfoList();
        }

        return $this->returnsInfo;
    }

    /**
     * @return string|null
     */
    public function getPdf()
    {
        if (! $this->hasLabels()) {
            return null;
        }

        return implode( $this->getPdfArray() );
    }

    /**
     * @return array|null
     */
    public function getPdfArray()
    {
        if (! $this->hasLabels()) {
            return null;
        }

        return array_map('base64_decode', $this->offsetGet('labels'));
    }

    /**
     * @return bool
     */
    public function hasLabels(): bool
    {
        return ! empty($this->offsetExists('labels'));
    }

    protected function buildParcelsInfoList(): void
    {
        if (empty($this->offsetExists('parcels'))) {
            return;
        }

        foreach ($this->offsetGet('parcels') as $info) {
            $this->parcelsInfo[] = new ParcelInfo(
                $info['parcelNumber'],
                $info['trackId'],
                $info['location']
            );
        }
    }

    protected function buildReturnsInfoList(): void
    {
        if (empty($this->offsetExists('returns'))) {
            return;
        }

        foreach ($this->offsetGet('returns') as $info) {
            $this->returnsInfo[] = new ParcelInfo(
                $info['parcelNumber'],
                $info['trackId']
            );
        }
    }
}
