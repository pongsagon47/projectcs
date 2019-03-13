<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class UniqeIdCrad implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        $user_id = $this->id;
        $id_card = str_replace(" ", "", $value);
        $query = User::query()
            ->where('id','!=',$user_id)
            ->where('id_card', $id_card )->first();

        if ($query){
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'เลขบัตรประชาชนถูกใช้ไปแล้ว';
    }
}
