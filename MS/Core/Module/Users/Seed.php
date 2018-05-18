<?php

namespace  MS\Core\Module\Users;

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
        $this->seedDefaultUser();
    }


    public function seedDefaultUser(){
          $ms_users=new \B\Users\Model();

       //  $ms_users->UniqId="admin001";
       //  $ms_users->FirstName="Mitul";
       //  $ms_users->LastName="Patel";
       // // $ms_users->Gender="M";
       //  $ms_users->Email="mitul.a.patel19@gmail.com";
       //  $ms_users->MobileNumber="9662611234";
       //  $ms_users->Username="mitul";
       //  $ms_users->Password=\MS\Core\Helper\Comman::en("mitul");
       // // $ms_users->RememberToken="";
       //  $ms_users->RoleCode="5";
       //  $ms_users->OTP="0251";  
       // // $ms_users->LastLogin="0.0.0.0";
       //  $ms_users->Status=true;
       //  $ms_users->checkSave(); 



          $ms_users->UniqId="admin002";
        $ms_users->FirstName="jay";
        $ms_users->LastName="Patel";
       // $ms_users->Gender="M";
        $ms_users->Email="shafewala.social@gmail.com";
        $ms_users->MobileNumber="9537818580";
        $ms_users->Username="Jay";
        $ms_users->Password=\MS\Core\Helper\Comman::en("jay!123");
       // $ms_users->RememberToken="";
        $ms_users->RoleCode="5";
        $ms_users->OTP="0251";  
       // $ms_users->LastLogin="0.0.0.0";
        $ms_users->Status=true;
        $ms_users->checkSave(); 

    

    }
}
