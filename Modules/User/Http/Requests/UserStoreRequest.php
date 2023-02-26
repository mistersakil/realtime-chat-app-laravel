<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
{
    private $maxImageSize = 4 * 1024;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => ['required', 'max:100', 'min:5'],
            'email'                => ['required', 'email', 'max:50', 'min:8', 'unique:users,email'],
            'password'             => ['required', Password::min(8)->letters()->numbers()->symbols()],
            'fileName'             => ['sometimes', 'image', 'mimes:jpg,jpeg,png', "max:{$this->maxImageSize}"],
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
            'password.min'          => 'Password minimum length 8',
            'fileName.image'        => 'Avatar must be valid image file',
            'fileName.mimes'        => 'Avatar format must be jpg/jpeg/png',
            'fileName.max'          => "Avatar max file size {($this->maxImageSize / 1024)} MB",
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