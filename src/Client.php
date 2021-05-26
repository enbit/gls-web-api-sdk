<?php

namespace Enbit\GLS;

use GuzzleHttp\Client as HttpClient;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Enbit\GLS\Interfaces\Account;
use Enbit\GLS\Interfaces\Request;
use Enbit\GLS\Interfaces\Response;
use Enbit\GLS\Exceptions\RequestException;

class Client
{
    /**
     * @var Account
     */
    protected $account;

    /**
     * @var HttpClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new HttpClient();
    }

    public function on(Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function request(Request $request): Response
    {
        if (! $this->account) {
            throw new InvalidArgumentException('You need to define an account to make a request!');
        }

        $headers = [
            'Accept-Language'   =>  $this->account->langCode(),
            'Accept-Encoding'   =>  'gzip,deflate',
        ];

        $response = $this->client->request(
            $request->getMethod(),
            rtrim($this->account->apiURL(), '/').'/'.$request->getEndpoint(),
            [
                'headers' => $headers,
                'auth' => [$this->account->userName(), $this->account->password()],
                'json' => $this->payload($request),
                'http_errors' => false,
            ]
        );

        if (! $this->isSuccess($response)) {
            throw new RequestException($response);
        }

        return $this->decodeResponse(
            $response,
            $request
        );
    }

    protected function decodeResponse(ResponseInterface $response, Request $request): Response
    {
        return $request->makeResponse(
            json_decode(
                $response->getBody()->getContents(),
                true
            )
        );
    }

    protected function isSuccess(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }

    public function payload(Request $request): array
    {
        return $request->toArray();
    }
}
