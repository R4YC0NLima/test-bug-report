<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $email
 * @property boolean $admin
 * @property string $password
 */
class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id     = $this->segment(3);
        $rules  = [
            'name'      => ['required', 'string'],
            'email'     => ['required', 'string', 'email', "unique:users,email,{$id},id"],
            'admin'     => ['required', 'integer'],
            'password'  => ['required', 'string'],
        ];

        if($this->method() == 'PUT') {
            $rules['name']      = ['nullable', 'string'];
            $rules['email']     = ['nullable', 'email'];
            $rules['admin']     = ['nullable', 'integer'];
            $rules['password']  = ['nullable', 'string'];
        }

        return $rules;
    }
}
