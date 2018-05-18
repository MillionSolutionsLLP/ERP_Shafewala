<?php
namespace B\IM;


use \Illuminate\Http\Request;





class Base
{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\IM\Controller";
public static $model="\B\M\IM\Model";


public static $routes=[
						[
						'name'=>'IM.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],


						[
						'name'=>'IM.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],



						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/warehouse',
						'method'=>'addWarehouse',
						'type'=>'get',
						],


						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/warehouse',
						'method'=>'addWarehousePost',
						'type'=>'post',
						],



						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/edit/warehouse/{UniqId}',
						'method'=>'editWarehouse',
						'type'=>'get',
						],

						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/edit/warehouse',
						'method'=>'editWarehousePost',
						'type'=>'post',
						],

						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/delete/warehouse/{UniqId}',
						'method'=>'deleteWarehouse',
						'type'=>'get',
						],


						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/ward/',
						'method'=>'addWard',
						'type'=>'get',
						],

						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/ward/',
						'method'=>'addWardPost',
						'type'=>'post',
						],


						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/ward/{UniqId}/print',
						'method'=>'addWardPrint',
						'type'=>'get',
						],


						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/ward/{UniqId}/printOut',
						'method'=>'addWardPrintout',
						'type'=>'get',
						],

						



						[
						'name'=>'IM.Warehouse.Master',
						'route'=>'/add/ward/print',
						'method'=>'WardPrint',
						'type'=>'get',
						],




						


					];

public static $tableNo="2";



public static $connection ="MSDBC";

public static $allOnSameconnection=false;



////////////////////////////////////////////////////////////////////////
// Warehouse Master Module Start
////////////////////////////////////////////////////////////////////////
public static $table="IM_Warehouse_Master";

public static $tableStatus=True;

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'WarehouseName','type'=>'string','input'=>'text',],
['name'=>'WarehouseLocation','type'=>'string','input'=>'text',],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];



////////////////////////////////////////////////////////////////////////
// Warehouse Master Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Warehouse  Module Start
////////////////////////////////////////////////////////////////////////


public static $connection1 ="IM_Data";

public static $table1="IM_Warehouse_";

public static $tableStatus1=false;

public static $field1=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'ProductCode','type'=>'string','input'=>'text',],
['name'=>'ProductStock','type'=>'string','input'=>'text',],

];


////////////////////////////////////////////////////////////////////////
// Warehouse  Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Warehouse Transaction  Module Start
////////////////////////////////////////////////////////////////////////

public static $connection2 ="IM_Master";

public static $table2="IM_Warehouse_Transaction";

public static $tableStatus2=true;

public static $field2=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'ProductCode','type'=>'string','input'=>'text','link'=>'PM:0',],
['name'=>'WarehouseCode','type'=>'string','input'=>'text','link'=>'IM:0',],
['name'=>'TransactionType','type'=>'string','input'=>'text','input'=>'radio','default'=>'direction'],
['name'=>'TransactionAmount','type'=>'string','input'=>'text',],

];


////////////////////////////////////////////////////////////////////////
// Warehouse Transaction  Module End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Warehouse TransactionType  Module Start
////////////////////////////////////////////////////////////////////////



public static $table3="IM_TransactionType";

public static $tableStatus3=false;

public static $field3=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'TransactionTypeName','type'=>'string','input'=>'text',],
['name'=>'TransactionTypeDirection','type'=>'boolean','input'=>'radio','callback'=>'direction'],


];


////////////////////////////////////////////////////////////////////////
// Warehouse TransactionType  Module End
////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////
// Product Stock Data  Module Start
////////////////////////////////////////////////////////////////////////


public static $connection4 ="IM_Data";
public static $table4="IM_Product_";

public static $tableStatus4=true;

public static $field4=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'TransactionCode','type'=>'string','input'=>'text',],
['name'=>'WarehouseCode','type'=>'string','input'=>'text',],
['name'=>'Rented','type'=>'boolean','input'=>'radio','default'=>'status'],



];


////////////////////////////////////////////////////////////////////////
// Product Stock Data  Module End
////////////////////////////////////////////////////////////////////////





////////////////////////////////////
/////////////////////////////////////
//MODEL CALLBACK FUNCTIONS///////////
///////////////////////////////////
/////////////////////////////////




public static function status(){
	return [
	'Hide','Publish'
	];
}


public static function direction(){
	return [
	'Out','In'
	];
}



public static function makeWarehouseTable(){




}








//////////////////////////////
//////////////////////////////
//DO NOT EDIT BELOW///////////
////////////////////////////
//////////////////////////



public static  function genFormData($edit=false,$data=[],$id=false){
	
	$array=[];
	if($edit and count($data)>0){

		$model=new Model($id);
		
		//dd($model);

		$v=$model->where(array_keys($data)[0],$data[array_keys($data)[0]])->first();

		if($v!=null){
			$v=$v->toArray();
		}
		//dd($v);

		if($id){
		
				$field="field".$id;
				foreach (self::$$field as $value) {
				
				//var_dump($value);
				if(array_key_exists($value['name'], $v)){

					$value['value']=$v[$value['name']];		
				
				}

				$data=self::genFieldData($value);
					
				$unset=['default'];
				foreach ($unset as $value1) {
						unset($data[$value1]);
					}

				if($data!=null and count($data)>2)$array[]=$data;	
			}
			


			}else{

				foreach (self::$field as $value) {

				//if(array_key_exists('callback', $value))unset($value['callback']);
				$value['value']=$v[$value['name']];
				//$test[]=$value;
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);	
				}
			}

		
		if(count($data)==1){

	

			
		}

		
		
			
	}else{

		if($id){
			$field="field".$id;
			foreach (self::$$field as $value) {
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);		
				}


		}else{

				foreach (self::$field as $value) {
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);		
				}


		}
		

	}

	
	return $array;
}


public static function genUniqID(){
	//if($this->where(''))
	return \MS\Core\Helper\Comman::random(2,1);
}


public static function getTable($id=false){
	if($id){
		$table='table'.$id;
		return self::$$table;
		}else{
			return self::$table;
			
		
	}
}

public static function getTableStatus($id=false){
	if($id){
		$table='tableStatus'.$id;

		return self::$$table;
		}else{
			return self::$tableStatus;
			
		
	}
}

public static function getConnection($id=false){
	if($id){

		if(self::$allOnSameconnection){
			$connection='connection';
			}else{
			$connection='connection'.$id;
			}

		if(isset(self::$$connection))
		return self::$$connection;
		return self::$connection;
		}else{
		return self::$connection;
	}
}

public static function getField($id=false){
	if($id){
		
		$field='field'.$id;
		return self::$$field;
	}else{
	return self::$field;	
	}
	
}


public static function seed(){
	return \DB::connection(self::getConnection())->table(self::getTable());
}

public static function migrate($data=[]){
	
			
			if(count($data)>0){

				
				foreach ($data as $key => $value) {
							
							if(array_key_exists('id', $value)){

								$id=$value['id'];
								$table=self::getTable($id);
								$field=self::getField($id);	


								if(array_key_exists('code', $value)){

									$table.=$value['code'];

								}
								
								if(self::$allOnSameconnection){
								$connection=self::getConnection();
								}else{
								$connection=self::getConnection($id);	
								}



								if(!\Schema::connection($connection)->hasTable($table)){
								
								\MS\Core\Helper\Comman::makeTable($table,$field,$connection);



								}


								return [

									'id'=>$id,
									'tableName'=>$table,
									'connection'=>$connection,
								];
								
							}


			

				}						


			}else{

			$tableNo=self::$tableNo;
			$tableName="table";
			$fieldName="field";
			$connectionName="connection";

			for ($i=0; $i < $tableNo+1 ; $i++) { 
			
			$id=$i;
			$table=self::getTable($id);
			$field=self::getField($id);

			if(self::$allOnSameconnection){
			$connection=self::getConnection();
			}else{
			$connection=self::getConnection($id);	
			}

			if(self::getTableStatus($id))\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
			

			}


			

			

		}

}

public static function rollback($data=[]){


	if(count($data)>0){


				
				foreach ($data as $key => $value) {
							
							if(array_key_exists('id', $value)){

								$id=$value['id'];
								$table=self::getTable($id);
								


								if(array_key_exists('code', $value)){

									$table.=$value['code'];

								}
								
								if(self::$allOnSameconnection){
								$connection=self::getConnection();
								}else{
								$connection=self::getConnection($id);	
								}


								\MS\Core\Helper\Comman::deleteTable($table,$connection);
								
							}


			

				}						


			}
		

		// 	$tableNo=7;

		// 	$tableName="table";
		// 	$fieldName="field";
		// 	$connectionName="connection";

		// $table=self::getTable($id);


		// for ($i=0; $i < $tableNo+1 ; $i++) { 


		// if(self::$allOnSameconnection){
		// 	$connection=self::getConnection();
		// }else{
		// 	$connection=self::getConnection($id);
		// }
		// \MS\Core\Helper\Comman::deleteTable($table,$connection);	

		// }
}






public static function genFieldData($data){
	$array=[];

	if (array_key_exists('value', $data)) {
		if($data != null){
			$value=$data['value'];
		}
	}

	switch ($data['input']) {
		case 'text':

			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if (array_key_exists('link', $data)) {
				$array['link']=[

				'mod'=>explode(':', $data['link'])[0] ,
			

			];
			}

			break;

		case 'email':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'default'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			break;

		case 'number':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;
		case 'option':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'data'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'editLock'=>$data['editLock'],
			];
			break;

		case 'disable':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;


		case 'radio':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'data'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			break;

		case 'check':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;

		case 'password':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;


			case 'textarea':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;

			case 'auto':
			if(array_key_exists('hidden', $data)){
				if ($data['hidden']) {
					$data['input']='hidden';
				}
			}
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			//'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;
			case 'date':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;

			case 'file':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			break;
		

		default:
			# code...
			break;
	}

	if(isset($value)){
		$array['value']=$value;
		if($array['value']=='array'){
			$array['value']='';
		}
	}

	$lable=preg_split('/(?=[A-Z])/',ucfirst($data['name']));
	unset($lable[0]);
	(count($lable) >= 2 ? $array['lable']=implode(' ', $lable) : null );

	return $array;
}
public static function decode($UniqId){
	$UniqId=str_replace('_','/',$UniqId);
	return $UniqId;
}


public static function enode($UniqId){
	$UniqId=str_replace('/','_',$UniqId);
	return $UniqId;
}


}
