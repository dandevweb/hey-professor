<?php

namespace App\Rules;

use App\Models\Question;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameQuestionRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->validationRule($value)) {
            $fail('The question has already been taken.');
        }
    }

    private function validationRule(string $value): bool
    {
        return Question::whereQuestion($value)->exists();
    }
}
