<?php

namespace App\Service\Integration;

use Illuminate\Database\Eloquent\Collection;
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

        if(!$address->ok()) {
            return [];
        }

        return $this->parseResponse($address->json());
    }

    /**
     * parse response to api default design
     *
     * @param array $data
     * @return array
     */
    public function parseResponse(array $data): array
    {
        return [
            'zipcode'      => (int)$data['cep'],
            'state'        => $data['state'],
            "city"         => $data['city'],
            "neighborhood" => $data['neighborhood'],
            "street"       => $data['street'],
        ];
    }
}
