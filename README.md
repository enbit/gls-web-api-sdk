# GLS SDK for Web API for Parcel Processing

## Installation

You can install the package via composer:

```bash
composer require enbit/gls-web-api-sdk
```

## Usage

``` php
use Enbit\GLS\Client;
use Enbit\GLS\Models\Account;
use Enbit\GLS\Models\Parcel;
use Enbit\GLS\Requests\Shipment;
        
$account = new Account(
            'USERNAME',
            'PASSWORD',
            'CUSTOMERID',
            'CONTACTID',
            'LANGCODE'
        );
$client = new Client();        
        
$request = new Shipment()
    ->setShipperId($account->shipperID())
    ->setDeliveryAddress(<class that extends \Enbit\GLS\Interfaces\Address>)
    ->setShipperAddress(<class that extends \Enbit\GLS\Interfaces\Address>)
    ->setReturnAddress(<class that extends \Enbit\GLS\Interfaces\Address>)
    ->setPickupAddress(<class that extends \Enbit\GLS\Interfaces\Address>);

$parcel = (new Parcel)
    ->setWeight(4.5)
    ->setComment('comment')
    ->setReferences(['parcel_refernce']);

$request->addParcel($parcel);

/** @var \Enbit\GLS\Responses\Shipment $response */
$response = $client->on($account)->request($request);

if ($response->isSuccess()) {

    // get the pdf
    $response->getPdf();
}
```