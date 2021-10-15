<?php

namespace App\Rules;

use Validator;
use Illuminate\Contracts\Validation\Rule;

class MultiLocaleRule implements Rule
{
    protected $locales = [];
    protected $rule = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($locales, $rule)
    {
        $this->locales = $locales;
        $this->rule = $rule;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        foreach ($this->locales as $locale) {
            $validator = Validator::make($value, [$locale => $this->rule]);
            if ($validator->passes()) {
                return true;
            }
        }

        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Some locale is not valid!';
    }
}
