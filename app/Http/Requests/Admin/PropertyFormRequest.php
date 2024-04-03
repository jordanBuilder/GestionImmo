<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //regles de validation
            "title"=>["required","min:8"],

            "description"=>["required","min:10"],           

            "surface"=>["required","integer",'min:10'],           
            
            "price"=>["required","integer"],           
            
            "city"=>["required"],

            "rooms"=>["required","integer"],

            "bedRooms"=>["required","integer"],

            "floor"=>["required","integer"],

            "address"=>["required","min:3"],

            "codePostal"=>["required","min:3"],

            "sold"=>["required","boolean"],  
            'options'=>["array",'exists:options,id','required']   
        ];
    }

    public function messages(){
        return[

        ];
    }

}
