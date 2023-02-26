<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RoleStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => ['required', 'unique:roles,name', 'max:50', 'min:2'],
            'guard_name'           => ['sometimes', 'max:50', 'min:2'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Role name required',
            'name.max'              => 'Role name maximum length 50',
            'name.min'              => 'Role name minimum length 2',
            'name.unique'           => 'Role name must be unique',
            'guard_name.min'        => 'Guard minimum length 2',
            'guard_name.max'        => 'Guard maximum length 50',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            ## Format validation error messages using _formatValidationErrors
            _formatValidationErrors($validator->errors()->toArray());
        });
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}