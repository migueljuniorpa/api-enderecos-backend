<?php

namespace App\Service\Integration;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ApiAddresses
{
    private array $config;

    public function __construct()
    {
        $this->config = config('integrations.brasilApi');
    }

    /**
     * get address by zipcode from api BrasilAPI
     *
     * @param int $zipcode
     * @return array
     */
    public function getAddressByZipcode(int $zipcode): array
    {
        $address = Http::get(sprintf($this->config['addresses'], $zipcode));

        return $this->parseResponse($address);
    }

    /**
     * parse response to api default design
     *
     * @param Response $data
     * @return array
     */
    public function parseResponse(Response $data): array
    {
        if(!$data->ok()) {
            return [];
        }

        return [
            'zipcode'      => (int)$data['cep'],
            'state'        => $data['state'],
            "city"         => $data['city'],
            "neighborhood" => $data['neighborhood'],
            "street"       => $data['street'],
        ];
    }
}
