<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class TenantExists implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $client = new Client(['base_uri' => 'http://booking-service.loc']);

        $response = $client->get('/api/tenant/get', [
            'query' => ['tenant_id' => $value],
        ]);

        $response = json_decode($response->getBody(), true);

        if (isset($response['error'])) {
            $fail('Такого жильца не существует!');
        }
    }
}
