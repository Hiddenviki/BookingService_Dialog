<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_id' => 1,
            'recipient_id' => 2,
            'text' => fake()->realText(mt_rand(100, 200)),
            'status' => 0,
            'dialog_id' => 1,
        ];
    }

}
