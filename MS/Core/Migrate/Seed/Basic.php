<?php
namespace MS\Core\Migrate\Seed;

use Illuminate\Database\Seeder;





class Basic extends Seeder{

 public function run()
    {
    	



    	//$this->call(RoleCatTable::class);
    	//$this->call(RoleTable::class);
    	//$this->call(RightTable::class);
    	$this->call(\MS\Core\Module\Users\Seed::class);
    //	$this->call(\MS\Core\Module\MAS\Seed::class);
    //	$this->call(\MS\Core\Module\PM\Seed::class);

    }

}