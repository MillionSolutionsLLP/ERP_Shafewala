<?php

namespace  MS\Core\Module\PM;

use Illuminate\Database\Seeder;

class Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->basicRaneSlab();
        $this->basicProductType();   
        $this->basicProduct();
 
    }

    public function basicProduct(){



        $data=[
                [
                "UniqId"=>"111",
                "ProductName"=>"Pink",
                "ProductTypeCode"=>"111",
                "ProductRentSlabCode"=>"111",
                ],

                [
                "UniqId"=>"112",
                "ProductName"=>"Orange",
                "ProductTypeCode"=>"112",
                "ProductRentSlabCode"=>"111",
                ],


                [
                "UniqId"=>"113",
                "ProductName"=>"Multi Colors",
                "ProductTypeCode"=>"113",
                "ProductRentSlabCode"=>"111",
                ],

    ];


        foreach ($data as  $value) {

        $model=new \B\PM\Model();
        $model->UniqId=$value['UniqId'];
        $model->ProductName=$value['ProductName'];
        $model->ProductTypeCode=$value['ProductTypeCode'];
        $model->ProductRentSlabCode=$value['ProductRentSlabCode'];
        $model->checkSave();
        }

    }


    public function basicProductType(){

        $data=[

            [
                
                "UniqId"=>"111",
                "ProductTypeName"=>"Single",
                "ProductUnitName"=>"Paghadi",
                'Status'=>true,
            ],  

            [
                
                "UniqId"=>"112",
                "ProductTypeName"=>"Single Valvet",
                "ProductUnitName"=>"Paghadi",
                'Status'=>true,
            ],

            [
                
                "UniqId"=>"113",
                "ProductTypeName"=>"Multi",
                "ProductUnitName"=>"Paghadi",
                'Status'=>true,
            ]    
        ];

        foreach ($data as  $value) {
            
                $model=new \B\PM\Model(1);
                $model->UniqId=$value['UniqId'];
                $model->ProductTypeName=$value['ProductTypeName'];
                $model->ProductUnitName=$value['ProductUnitName'];
                $model->Status=true;
                $model->checkSave();

        }


        

    }


    public function basicRaneSlab(){
        
        $model=new \B\PM\Model(2);
        $model->UniqId="111";
        $model->ProductRentName="Normal";
        $model->ProductRentPrice=80;
        $model->ProductRentDeposit=20;
        $model->ProductRentDepositAmount=250;
        $model->Status=true;
    }

}
