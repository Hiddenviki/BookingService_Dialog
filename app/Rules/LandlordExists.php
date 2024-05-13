<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class LandlordExists implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $client = new Client(['base_uri' => 'http://accommodation-service.loc']);

        $response = $client->get('api/landlord/get', [
            'query' => ['landlord_id' => $value],
        ]);

        $response = json_decode($response->getBody(), true);

        if (isset($response['error'])) {
            $fail('Такого землевладельца не существует!');
        }
    }
}
