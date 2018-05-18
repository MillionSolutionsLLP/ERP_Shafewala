<?php

namespace B\MAS\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class TaxAdd extends FormRequest
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
            
            ];

    }

                protected function formatErrors(Validator $validator)
{
    
    //dd($validator->errors()->toJson());
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}