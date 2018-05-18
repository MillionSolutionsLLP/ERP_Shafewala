<?php
namespace MS\Core\Migrate\Seed;

use Illuminate\Database\Seeder;



class RoleCatTable extends Seeder
{

	public function run()
    {
        	$table=\MS\Core\Migrate\RoleCatTable::seed();

        	$data=[
        	[
        				'UniqId'=>\MS\Core\Migrate\RoleCatTable::genUniqID(),
        	        	'RoleCatName'=>'IT Team',
        	        	'Status'=>true
        	],
        	[
        				'UniqId'=>\MS\Core\Migrate\RoleCatTable::genUniqID(),
        	        	'RoleCatName'=>'Administration',
        	        	'Status'=>true			
        	],

        	[
        				'UniqId'=>\MS\Core\Migrate\RoleCatTable::genUniqID(),
        	        	'RoleCatName'=>'Accounts',
        	        	'Status'=>true			
        	]


        	];


            foreach ($data as $value) {
               \MS\Core\Migrate\RightTable::addRole("cat_".$value['UniqId']);
            }


        	$table->insert($data);
        	
        	

    	

    }


}