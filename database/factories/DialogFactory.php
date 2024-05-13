<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dialog>
 */
class DialogFactory extends Factory
{
    public function definition(): array
    {
        static $i = 0;

        return [
            'landlord_id' => ++$i,
            'tenant_id' => ++$i,
        ];
    }

}
