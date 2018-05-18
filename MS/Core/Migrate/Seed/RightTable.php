<?php
namespace MS\Core\Migrate\Seed;

use Illuminate\Database\Seeder;



class RightTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	

        	$table=\MS\Core\Migrate\RightTable::seed();




        	$route=[];
			$r=\Route::getRoutes();
			//dd($r);
			foreach ($r as  $value) {
				//dd($value);
				$data['uri']=( (explode('/', $value->uri)[0] == "")  ? "/" : $value->uri);
				$data['key']=explode('/', $data['uri'])[0];
				$data['type']=$value->methods[0];
				$route[$data['key']][(array_key_exists(1, explode('/', $data['uri'])) ? explode('/', $data['uri'])[1] : $data['uri'])][]=[
				'link'=>$data['uri'],
				'type'=>$data['type'],
				'moduleCode'=> strtoupper((array_key_exists(1, explode('/', $data['uri'])) ? explode('/', $data['uri'])[1] : $data['uri']))
				];

			}

			foreach ($route as $value1) {
						
				foreach ($value1 as $value2) {
						foreach ($value2 as $value) {
							//	dd($value);

								$data=[

							'UniqId'=>\MS\Core\Migrate\RightTable::genUniqID(),
							'RightLink'=>(  array_key_exists('link', $value)  ?  $value['link'] : '/' ),
							'RightTypeCode'=>(  array_key_exists('type', $value)  ?  $value['type'] : '/' ),
							'RightModuleCode'=>(  array_key_exists('moduleCode', $value)  ?  ($value['moduleCode'] ==null ? "MAIN" :  $value['moduleCode'] ) : 'Main' ),
							'Status'=>'true',

						];

						$right=self::rightArray();
						if(array_key_exists((  array_key_exists('link', $value)  ?  $value['link'] : '/' ), $right)){;
							$data['RightTypeCode']=$right[(array_key_exists('link', $value)  ?  $value['link'] : '/' )];
						}

			//			dd($data);

        	$table->insert($data);

						}
				}

					

			}



    }

    public static function rightArray(){

    	$typeCode=[
    	'v'=>'View',
    	'e'=>'Edit',
    	'a'=>'Add',
    	'd'=>'Delete',
    	];
    	return [

    	'/'=>'v',
    	'admin'=>'v',
    	'admin/Panel'=>'v',
    	'admin/Panel/data'=>'v',
    	'admin/Users'=>'v',
    	'admin/Users/login'=>'v',
    	'admin/Users/login/post'=>'v',
    	'admin/Users/login/otp'=>'v',
    	'admin/Users/login/otp/post'=>'v',
    	'admin/Users/logout'=>'v',
    	'admin/Users/add'=>'a',
    	'admin/Users/add/post'=>'a',
    	''


    	];

    }
}
