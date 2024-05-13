<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sender_id' => 'required|int',
            'recipient_id' => 'required|int',
            'text' => 'required|min:2|max:300',
            'dialog_id' => 'required|int',
        ];
    }
}
