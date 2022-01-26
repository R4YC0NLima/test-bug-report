<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $title
 * @property string $description
 * @property integer $type_id
 * @property string $status
 * @property mixed $status_id
 */
class BugFormRequest extends FormRequest
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
        $rules  = [
            'title'         => ['required', 'string'],
            'type_id'       => ['required', 'integer'],
            'status_id'     => ['required', 'integer'],
            'description'   => ['required', 'min:3', 'max:10000'],
        ];

        if($this->method() == 'PUT') {
            $rules['title']         = ['nullable', 'string'];
            $rules['type_id']       = ['nullable', 'integer'];
            $rules['status_id']     = ['nullable', 'integer'];
            $rules['description']   = ['nullable', 'min:3', 'max:10000'];
        }

        return $rules;
    }
}
