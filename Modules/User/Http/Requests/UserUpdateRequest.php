<?php

namespace Modules\User\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => ['required', 'max:100', 'min:5'],
            'email'                => ['required', 'email', 'max:50', 'min:8', Rule::unique('users')->ignore($this->user)],
            'password'             => ['sometimes', 'nullable', Password::min(8)->letters()->numbers()->symbols()],
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
            'name.required'         => 'Full name required',
            'name.max'              => 'Full name maximum length 100',
            'name.min'              => 'Full name minimum length 5',
            'email.required'        => 'Email ID required',
            'email.max'             => 'Email maximum length 50',
            'email.min'             => 'Email minimum length 8',
            'email.email'           => 'Email must be real',
            'password.required'     => 'Password required',
            'password.min'          => 'Password minimum length 8'
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
            ## Create new validationErrorDisplayService and display error alert
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