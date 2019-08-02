<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateKoorRequest extends FormRequest
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
            'desaKoor'=> 'required|numeric|exists:tb_kelurahandesa,id',
            'namaKoor'=> 'required|regex:/^[\s\w-]*$/|max:50',
            'alamatKoor'=> 'required|max:60',
            'noHpKoor'=> ['required', 'min:9', 'max:15', 'regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/'],
        ];
    }
}
