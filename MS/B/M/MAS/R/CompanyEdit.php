<?php

namespace B\MAS\R;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class CompanyEdit extends FormRequest
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

           'NameOfBussiness'=>"required",
           'GstNo'=>"required|string|size:15",
           'CinNo'=>"required|string|size:21",
           'PanNo'=>"required|string|size:10",

           'AddressStreet'=>"required",
           'AddressRoad'=>"required",
           'AddressCity'=>"required",

           'Pincode'=>"required|string|size:6",


           'BankName'=>"required",
           'AccountType'=>"required",
           'AccountNo'=>"required",
           'IfscCode'=>"required",


           'ContactNo'=>"required",
           'MobileNo'=>"required|string|size:10",
           'FaxNo'=>"required",
           'Email'=>"required",



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