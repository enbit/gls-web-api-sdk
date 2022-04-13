<?php

namespace Enbit\GLS\Models;

use Enbit\GLS\Interfaces\Account as AccountContract;
use http\Exception\InvalidArgumentException;

class Account implements AccountContract
{
    /**
     * @var string
     */
    protected $apiUrl = 'https://api.gls-group.eu/public/v1/';
    /**
     * @var string
     */
    protected $apiUrlSandbox = 'https://api-qs.gls-group.eu/public/v1/';
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $customerID;
    /**
     * @var string
     */
    protected $contactId;
    /**
     * @var bool
     */
    protected $sandbox;
    /**
     * @var string
     */
    protected $langCode;

    /**
     * The optional “Accept-Language” (Default value “en”) value determines the language of the label.
     * Accepted languages are given as letter code. Following languages are supported:
     * cs Czech
     * da Danish
     * de German
     * en English
     * es Spanish, Castilian
     * fb French (Belgium)
     * fi Finnish
     * fr French
     * hr Croatian
     * hu Hungarian
     * lu Luxembourgish, Letzeburgesch
     * nl Dutch
     * pl Polish
     * pt Portuguese
     * ro Romanian, Moldavian, Moldovan
     * sk Slovak
     * sl Slovenian
     * vl Flemish
     *
     * @var array
     */
    private $supportedLang = [
        'cs', 'da', 'de', 'en', 'es', 'fb', 'fi', 'fr', 'hr', 'hu', 'lu', 'nl', 'pl', 'pt', 'ro', 'sk', 'sl', 'vl',
    ];

    public function __construct(string $username, string $password, string $customerID, string $contactId, bool $sandbox = false, string $langCode = 'en')
    {
        $this->username = $username;
        $this->password = $password;
        $this->customerID = $customerID;
        $this->contactId = $contactId;
        $this->sandbox = $sandbox;

        $langCode = strtolower($langCode);
        if(! in_array($langCode, $this->supportedLang)){
            throw new InvalidArgumentException("langCode ('$langCode') not Supported by Gls Web API.
                \n Following languages are supported:
                \n cs Czech
                \n da Danish
                \n de German
                \n en English
                \n es Spanish, Castilian
                \n fb French (Belgium)
                \n fi Finnish
                \n fr French
                \n hr Croatian
                \n hu Hungarian
                \n lu Luxembourgish, Letzeburgesch
                \n nl Dutch
                \n pl Polish
                \n pt Portuguese
                \n ro Romanian, Moldavian, Moldovan
                \n sk Slovak
                \n sl Slovenian
                \n vl Flemish
            ");
        }

        $this->langCode = $langCode;
    }

    public function apiURL(): string
    {
        return $this->isSandbox()? $this->apiUrlSandbox : $this->apiUrl;
    }

    public function userName(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function customerID(): string
    {
        return $this->customerID;
    }

    public function contactId(): string
    {
        return $this->contactId;
    }

    public function shipperID(): string
    {
       return $this->customerID() . ' ' . $this->contactId();
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->sandbox;
    }

    /**
     * @param bool $sandbox
     */
    public function setSandbox(bool $sandbox): void
    {
        $this->sandbox = $sandbox;
    }

    public function langCode(): string
    {
        return $this->langCode;
    }
}
