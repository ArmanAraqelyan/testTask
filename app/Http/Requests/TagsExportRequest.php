<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsExportRequest extends FormRequest
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
            "isset" => "required_without_all:except|array",
            "except" => "required_without_all:isset|different:isset|array"
        ];
    }
}
