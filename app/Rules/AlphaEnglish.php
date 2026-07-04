<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AlphaEnglish implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[A-Za-z\s_-]+$/', $value)) {
            $fail('The :attribute field may only contain English letters, spaces, hyphens (-), and underscores (_).');
        }
    }
}
