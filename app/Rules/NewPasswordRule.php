<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NewPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // expresiones regulares en php que verifique la existencia de */&%$#
        // hace falta validar que tenga caracteres especiales
        return strlen($value)>7&&preg_match('~\d+~', $value)&&preg_match('~[a-z]+~',$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('passwords.requirements');
    }
}
