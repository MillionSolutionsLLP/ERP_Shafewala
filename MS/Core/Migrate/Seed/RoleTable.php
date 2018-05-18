<?php
namespace MS\Core\Migrate\Seed;

use Illuminate\Database\Seeder;



class RoleTable extends Seeder
{

	public function run()
    {
        	$table=\MS\Core\Migrate\RoleTable::seed();
            $table2=\MS\Core\Migrate\RoleCatTable::seed();

        	$data=[
        	[
        				'UniqId'=>\MS\Core\Migrate\RoleTable::genUniqID(),
        	        	'RoleName'=>'Web designer ',
        	        	'RoleCatCode'=>\MS\Core\Migrate\RoleCatTable::seed()->where('RoleCatName','=','IT Team')->value('UniqId'),
                        'Status'=>true
        	],
   

            [
                        'UniqId'=>\MS\Core\Migrate\RoleTable::genUniqID(),
                        'RoleName'=>'Admin',
                        'RoleCatCode'=>\MS\Core\Migrate\RoleCatTable::seed()->where('RoleCatName','=','Administration')->value('UniqId'),
                        'Status'=>true
            ],
    
            [
                        'UniqId'=>\MS\Core\Migrate\RoleTable::genUniqID(),
                        'RoleName'=>'CA',
                        'RoleCatCode'=>\MS\Core\Migrate\RoleCatTable::seed()->where('RoleCatName','=','Administration')->value('UniqId'),
                        'Status'=>true
            ],
   


   


        	];

            foreach ($data as $value) {
               \MS\Core\Migrate\RightTable::addRole("role_".$value['UniqId']);
            }




        	$table->insert($data);
        	
        	

    	

    }


}