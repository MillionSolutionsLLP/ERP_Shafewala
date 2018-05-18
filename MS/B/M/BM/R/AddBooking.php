<?php

namespace B\BM\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AddBooking extends FormRequest
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
            'UniqId'=>"required",
            //"BookingDate"=>"required|date|after:tomorrow",
            "BookingDate"=>"required|date",
            "BookingParty"=>"required",
            "BookingContactNo"=>"digits:10",
            "ProductCode"=>"array",
            "BookingQuantity"=>"array",
            "BookingRate"=>"array",
     
          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}