<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Permission;

class StoreRole extends FormRequest
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
        return [
            'title' => 'required|string|max:100|unique:roles',
            'description' => 'max:300',
            'permissions' => [
                'required',
                'array',
                Rule::in(Permission::all()->pluck('id')->toArray()),
            ],
        ];
    }
}
