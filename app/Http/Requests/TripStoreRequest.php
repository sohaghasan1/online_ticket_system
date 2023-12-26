<?php

namespace App\Http\Requests;

use App\Rules\TripDateRule;
use App\Rules\TripLocationRule;
use Illuminate\Foundation\Http\FormRequest;

class TripStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'departure_date' => [
                'required',
                (new TripDateRule())
            ], 
            'departure_time' => 'required',
            'departure_location_id' => 'required|exists:locations,id',
            'apertaure_location_id' => [
                'required',
                'exists:locations,id',
                (new TripLocationRule($this->departure_location_id))
            ],
            'bus_id' => 'required|exists:buses,id',
            'fare' => 'integer|required',
        ];
    }
}
