<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSaksiRequest extends FormRequest
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
            'desaSaksi'=> 'required|numeric|exists:tb_kelurahandesa,id',
            'namaKoorSaksi'=> 'required|numeric|exists:koors,id',
            'namaPartai'=> 'required|numeric|exists:partai,id',
            'noTPS'=> 'required',
            'namaSaksi'=> 'required|regex:/^[\s\w-]*$/|max:50',
            'alamatSaksi'=> 'required|max:60',
            'noHpSaksi'=> ['required', 'min:9', 'max:15', 'regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/'],
        ];
    }
}
