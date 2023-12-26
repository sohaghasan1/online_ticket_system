<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TripLocationRule implements ValidationRule
{
    private $departureLocationId;

    public function __construct($departureLocationId){
        $this->departureLocationId = $departureLocationId;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->departureLocationId == $value){
            $fail('Departure and aparture location cannot be same');
        }
    }
}
