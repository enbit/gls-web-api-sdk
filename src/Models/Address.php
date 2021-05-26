<?php

namespace Enbit\GLS\Models;

class Address
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $name1;

    /**
     * @var string|null
     */
    protected $name2;

    /**
     * @var string|null
     */
    protected $name3;

    /**
     * @var string
     */
    protected $street1;

    /**
     * House number
     * @var string|null
     */
    protected $blockNo1;

    /**
     * Two-letter country code
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * Mandatory for addresses located in Ireland
     * @var string|null
     */
    protected $province;

    /**
     * When “services.shopdeliveryservice” is requested, addresses.delivery.contact is mandatory.
     * @var string|null
     */
    protected $contact;

    /**
     * When “services.flexdeliveryservice” is requested, addresses.delivery.email is mandatory.
     * When “services.shopdeliveryservice” is requested, either addresses.delivery.email
     * and / or “addresses.delivery.mobile” has to be present
     * @var string|null
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $phone;

    /**
     * @see $email
     * @var string|null
     */
    protected $mobile;

    /**
     * @var string|null
     */
    protected $comments;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName1(): string
    {
        return $this->name1;
    }

    /**
     * @param string $name1
     */
    public function setName1(string $name1): void
    {
        $this->name1 = $name1;
    }

    /**
     * @return string|null
     */
    public function getName2(): ?string
    {
        return $this->name2;
    }

    /**
     * @param string|null $name2
     */
    public function setName2(?string $name2): void
    {
        $this->name2 = $name2;
    }

    /**
     * @return string|null
     */
    public function getName3(): ?string
    {
        return $this->name3;
    }

    /**
     * @param string|null $name3
     */
    public function setName3(?string $name3): void
    {
        $this->name3 = $name3;
    }

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->street1;
    }

    /**
     * @param string $street1
     */
    public function setStreet1(string $street1): void
    {
        $this->street1 = $street1;
    }

    /**
     * @return string|null
     */
    public function getBlockNo1(): ?string
    {
        return $this->blockNo1;
    }

    /**
     * @param string|null $blockNo1
     */
    public function setBlockNo1(?string $blockNo1): void
    {
        $this->blockNo1 = $blockNo1;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @param string|null $province
     */
    public function setProvince(?string $province): void
    {
        $this->province = $province;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
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

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string|null
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string|null $comments
     */
    public function setComments(?string $comments): void
    {
        $this->comments = $comments;
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'name1' => $this->getName1(),
            'name2' => $this->getName2(),
            'name3' => $this->getName3(),
            'street1' => $this->getStreet1(),
            'blockNo1' => $this->getBlockNo1(),
            'country' => $this->getCountry(),
            'zipCode' => $this->getZipCode(),
            'city' => $this->getCity(),
            'province' => $this->getProvince(),
            'contact' => $this->getContact(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'mobile' => $this->getMobile(),
            'comments' => $this->getComments(),
        ]);
    }
}
