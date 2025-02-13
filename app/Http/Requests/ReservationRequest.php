<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

            'user_name' => ['required', 'string', 'max:255'],
            'reservation_date' => ['required', 'date', 'after:today'],
            'duration_hours'=>['required','integer','min:1'],
            'yacht_id'=>['required','exists:yachts,id'],
        ];
    }
}
