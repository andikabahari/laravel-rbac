<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Permission;

class UpdateRole extends FormRequest
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
        $unique = $this->title != $this->current_title
                ? '|unique:roles'
                : null;

        return [
            'title' => 'required|string|max:100' . $unique,
            'description' => 'max:300',
            'permissions' => [
                'required',
                'array',
                Rule::in(Permission::all()->pluck('id')->toArray()),
            ],
        ];
    }
}
