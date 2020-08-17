<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Role;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = $this->email != $this->current_email
                ? '|unique:users'
                : null;

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $unique,
            'roles' => [
                'required',
                'array',
                Rule::in(Role::all()->pluck('id')->toArray()),
            ],
        ];
    }
}
