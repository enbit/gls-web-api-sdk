<?php

namespace Enbit\GLS\Requests;

use Enbit\GLS\Models\Address;
use Enbit\GLS\Interfaces\Response;
use Enbit\GLS\Models\Incoterm;
use Enbit\GLS\Models\Parcel;
use Enbit\GLS\Models\ReturnParcel;
use \Enbit\GLS\Responses\Shipment as ShipmentResponse;

class Shipment extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'shipments';

    /**
     * @var string
     */
    protected $shipperId;

    /**
     * @var \DateTime|null
     */
    protected $shipmentDate;

    /**
     * @var array
     */
    protected $references;

    /**
     * @var string|null
     */
    protected $brokerReference;

    /**
     * @var Address[]
     */
    protected $addresses = [];

    /**
     * @var Address|null
     */
    protected $deliveryAddress;

    /**
     * @var Address|null
     */
    protected $shipperAddress;

    /**
     * @var Address|null
     */
    protected $returnAddress;

    /**
     * @var Address|null
     */
    protected $pickupAddress;

    /**
     * @see Incoterm
     * @var int|null
     */
    protected $incoterm;

    /**
     * @var Parcel[]
     */
    protected $parcels = [];

    /**
     * @var ReturnParcel[]
     */
    protected $returnParcels = [];

    /**
     * Available formats: PDF, PNG
     * @var string
     */
    protected $labelFormat = 'PDF';

    /**
     * Available sizes: A6, A5, A4
     * @var string
     */
    protected $labelSize = 'A6';

    /**
     * @return string
     */
    public function getShipperId(): string
    {
        return $this->shipperId;
    }

    /**
     * @param string $shipperId
     */
    public function setShipperId(string $shipperId): void
    {
        $this->shipperId = $shipperId;
    }

    /**
     * @return \DateTime|null
     */
    public function getShipmentDate(): ?\DateTime
    {
        return $this->shipmentDate;
    }

    /**
     * @param \DateTime|null $shipmentDate
     */
    public function setShipmentDate(?\DateTime $shipmentDate): void
    {
        $this->shipmentDate = $shipmentDate;
    }

    /**
     * @return array
     */
    public function getReferences(): array
    {
        return $this->references;
    }

    /**
     * @param array $references
     */
    public function setReferences(array $references): void
    {
        $this->references = $references;
    }

    /**
     * @param string $reference
     */
    public function addReference(string $reference): void
    {
        $this->references[] = $reference;
    }

    /**
     * @return string|null
     */
    public function getBrokerReference(): ?string
    {
        return $this->brokerReference;
    }

    /**
     * @param string|null $brokerReference
     */
    public function setBrokerReference(?string $brokerReference): void
    {
        $this->brokerReference = $brokerReference;
    }

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param Address $address
     * @param string $type
     */
    protected function addAddress(array $address, $type): void
    {
        $this->addresses[$type] = $address;
    }

    /**
     * @return Address|null
     */
    public function getDeliveryAddress(): ?Address
    {
        return $this->deliveryAddress;
    }

    /**
     * @param Address|null $deliveryAddress
     */
    public function setDeliveryAddress(?Address $deliveryAddress): void
    {
        $this->deliveryAddress = $deliveryAddress;
        $this->addAddress($deliveryAddress, 'delivery');
    }

    /**
     * @return Address|null
     */
    public function getShipperAddress(): ?Address
    {
        return $this->shipperAddress;
    }

    /**
     * @param Address|null $shipperAddress
     */
    public function setShipperAddress(?Address $shipperAddress): void
    {
        $this->shipperAddress = $shipperAddress;
        $this->addAddress($shipperAddress, 'alternativeShipper');
    }

    /**
     * @return Address|null
     */
    public function getReturnAddress(): ?Address
    {
        return $this->returnAddress;
    }

    /**
     * @param Address|null $returnAddress
     */
    public function setReturnAddress(?Address $returnAddress): void
    {
        $this->returnAddress = $returnAddress;
        $this->addAddress($returnAddress, 'return');
    }

    /**
     * @return Address|null
     */
    public function getPickupAddress(): ?Address
    {
        return $this->pickupAddress;
    }

    /**
     * @param Address|null $pickupAddress
     */
    public function setPickupAddress(?Address $pickupAddress): void
    {
        $this->pickupAddress = $pickupAddress;
        $this->addAddress($pickupAddress, 'pickup');
    }

    /**
     * @return int|null
     */
    public function getIncoterm(): ?int
    {
        return $this->incoterm;
    }

    /**
     * @see $incoterm
     * @param int|null $incoterm
     */
    public function setIncoterm(?int $incoterm): void
    {
        $this->incoterm = $incoterm;
    }

    public function addParcel(Parcel $parcel)
    {
        $this->parcels[] = $parcel;
    }

    public function addReturnParcel(ReturnParcel $parcel)
    {
        $this->returnParcels[] = $parcel;
    }

    public function setLabelAsPDF()
    {
        $this->labelFormat = 'PDF';
    }

    public function setLabelAsPNG()
    {
        $this->labelFormat = 'PNG';
    }

    /**
     * @return string
     */
    public function getLabelFormat(): string
    {
        return $this->labelFormat;
    }

    public function setSizeAsA6()
    {
        $this->labelSize = 'A6';
    }

    public function setSizeAsA5()
    {
        $this->labelSize = 'A5';
    }

    public function setSizeAsA4()
    {
        $this->labelSize = 'A4';
    }

    /**
     * @return string
     */
    public function getLabelSize(): string
    {
        return $this->labelSize;
    }

    public function makeResponse(?array $data): Response
    {
        return new ShipmentResponse($data);
    }

    public function toArray(): array
    {
        $params = [
            'shipperId' => $this->getShipperId(),
            'shipmentDate' => $this->getShipmentDate()->format('Y-m-d'),
            'references' => $this->getReferences(),
            'brokerReference' => $this->getBrokerReference(),
            'addresses' => array_map(function (Address $address) {
                return $address->toArray();
            }, $this->getAddresses()),
            'incoterm' => $this->getIncoterm(),
            'parcels' => array_map(function (Parcel $parcel) {
                return $parcel->toArray();
            }, $this->parcels),
            'returns' => array_map(function (ReturnParcel $parcel) {
                return $parcel->toArray();
            }, $this->returnParcels),
            'labelFormat' => $this->getLabelFormat(),
            'labelSize' => $this->getLabelSize(),
        ];

        return array_filter($params);
    }
}
