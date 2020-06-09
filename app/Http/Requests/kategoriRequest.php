<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kategoriRequest extends FormRequest
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
            "kategori_ad" => "required",
            "parent_id" => "required",
            "kategori_resim" => "required"
        ];
    }

    public function  messages(){
        return [
            "kategori_ad.required" => "Lütfen kategori isim kısmını doldurun",
            "parent_id.required" => "kategori türünü seçin",
            "kategori_resim.required" => "kategori resmini seçin",
        ];
    }


}
