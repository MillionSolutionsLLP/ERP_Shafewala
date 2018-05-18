<?php

namespace  MS\Core\Module\MAS;

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
     //   $this->MAS_Master_User();
        $this->MAS_Master_Company();
        //$this->MAS_CC_Master();
        $this->MAS_HSN_Master();
    }


    public function MAS_CC_Master(){

        $model=new \B\MAS\Model();
        $model->UniqId=\MS\Core\Helper\Comman::random(4,1);
        $model->Year=\MS\Core\Helper\Comman::getYr();
        $model->Rate="1";
        $model->checkSave(); 

    }

    public function MAS_Master_User(){
        
        if(\B\MAS\Base::getTableStatus()){


            $model=new \B\MAS\Model(7);
        $faker = \Faker\Factory::create();
        $model->UniqId=\MS\Core\Helper\Comman::random(4,1);
        $model->FirstName=$faker->firstNameMale;
        $model->LastName=$faker->lastName;
        $model->usename="admin";
        $model->password=\MS\Core\Helper\Comman::en("admin");
        $model->MobileNo="9662611234";
        $model->Email="mitul@millionsllp.com";
        $model->Desiganation="CA";
        $model->Gender="m";
        $model->checkSave(); 

        }
        

    }

    public function MAS_Master_Company(){

        $model=new \B\MAS\Model(1);
        $faker = \Faker\Factory::create();

        $model->UniqId=\MS\Core\Helper\Comman::random(4,1);
        $model->NameOfBussiness="Shafewala.com";
        $model->GstNo="24ABEFM8224F1ZG";
        $model->CinNo="U93000GJ2015NPL083458";
        $model->PanNo="ABEFM8224F ";
        $model->AddressStreet="44,Chandralok Society,";
        $model->AddressRoad="Near New Laxmi Sawmill";
        $model->AddressCity="Vyara, Dist. Tapi,Gujarat";
        $model->Pincode="394650";
        $model->BankName="BANK OF BARODA ";
        $model->AccountType="Current";
        $model->AccountNo="2690200000623";
        $model->IfscCode="BARB0VYARAX";
        $model->ContactNo="9662611234";
        $model->MobileNo="7990563470";
        $model->FaxNo="1234568789";
        $model->Email="sales@shafewala.com";

        $model->checkSave(); 


    }


    public function MAS_HSN_Master(){
        
        $model=new \B\MAS\Model(4);
        $model->UniqId=\MS\Core\Helper\Comman::random(4,1);
        $model->HsnName="0";
        $model->HsnCode="0";

        $model->checkSave(); 

    }
}
