<?php
namespace B\PM;


use \Illuminate\Http\Request;





class Base
{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\PM\Controller";
public static $model="\B\M\PM\Model";










public static $routes=[
						[
						'name'=>'PM.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'PM.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],



						[
						'name'=>'PM.Product.Rent.Slab',
						'route'=>'/add/prs',
						'method'=>'addProductRentSlab',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product.Rent.Slab',
						'route'=>'/add/prs',
						'method'=>'addProductRentSlabPost',
						'type'=>'post',
						],


						
						[
						'name'=>'PM.Product.Rent.Slab',
						'route'=>'/edit/prs/{UniqId}',
						'method'=>'editProductRentSlab',
						'type'=>'get',
						],


						[
						'name'=>'PM.Product.Rent.Slab',
						'route'=>'/delete/prs/{UniqId}',
						'method'=>'deleteProductRentSlab',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product.Rent.Slab',
						'route'=>'/edit/prs',
						'method'=>'editProductRentSlabPost',
						'type'=>'post',
						],


						/////////////

						[
						'name'=>'PM.Product.Type',
						'route'=>'/add/pt',
						'method'=>'addProductType',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product.Type',
						'route'=>'/add/pt',
						'method'=>'addProductTypePost',
						'type'=>'post',
						],


						
						[
						'name'=>'PM.Product.Type',
						'route'=>'/edit/pt/{UniqId}',
						'method'=>'editProductType',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product.Type',
						'route'=>'/edit/pt',
						'method'=>'editProductTypePost',
						'type'=>'post',
						],

						[
						'name'=>'PM.Product.Type',
						'route'=>'/delete/pt/{UniqId}',
						'method'=>'deleteProductType',
						'type'=>'get',
						],

						/////////

						[
						'name'=>'PM.Product',
						'route'=>'/add/product',
						'method'=>'addProduct',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product',
						'route'=>'/add/product',
						'method'=>'addProductPost',
						'type'=>'post',
						],


						
						[
						'name'=>'PM.Product',
						'route'=>'/edit/product/{UniqId}',
						'method'=>'editProduct',
						'type'=>'get',
						],

						[
						'name'=>'PM.Product',
						'route'=>'/edit/product',
						'method'=>'editProductPost',
						'type'=>'post',
						],

						[
						'name'=>'PM.Product',
						'route'=>'/delete/product/{UniqId}',
						'method'=>'deleteProduct',
						'type'=>'get',
						],
						///////////////


					];


public static $tableNo="2";






public static $connection ="MSDBC";

public static $allOnSameconnection=true;



////////////////////////////////////////////////////////////////////////
// Product Module Start
////////////////////////////////////////////////////////////////////////

public static $table="Master_Product";

public static $tableStatus=True;

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'ProductName','type'=>'string','input'=>'text'],
['name'=>'ProductTypeCode','type'=>'string','input'=>'option','callback'=>'getTypeCode','default'=>'status','editLock'=>false],
['name'=>'ProductRentSlabCode','type'=>'string','input'=>'option','callback'=>'getSlabCode','default'=>'status','editLock'=>false],

['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];


////////////////////////////////////////////////////////////////////////
// Product Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Rent Slab Module Start
////////////////////////////////////////////////////////////////////////



public static $table2="Master_Product_Rent_Slab";

public static $tableStatus2=True;

public static $field2=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'ProductRentName','type'=>'string','input'=>'text'],
['name'=>'ProductRentPrice','type'=>'string','input'=>'text'],
['name'=>'ProductRentDeposit','type'=>'string','input'=>'text'],
['name'=>'ProductRentDepositAmount','type'=>'string','input'=>'text'],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];



////////////////////////////////////////////////////////////////////////
// Rent Slab Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Product Type Module Start
////////////////////////////////////////////////////////////////////////
public static $table1="Master_Product_Type";

public static $tableStatus1=True;

public static $field1=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'ProductTypeName','type'=>'string','input'=>'text'],
['name'=>'ProductUnitName','type'=>'string','input'=>'text'],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];

////////////////////////////////////////////////////////////////////////
// Product Type Module End
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



public static function getTypeCode(){
	$model=new Model(1);
	$data=$model->get()->toArray();
	$return=[];
	foreach ($data as $key => $value) {
			$return[$value['UniqId']]= $value['ProductTypeName'];
	}
	return $return;
}



public static function getSlabCode(){
	$model=new Model(2);
	$data=$model->get()->toArray();
	$return=[];
	foreach ($data as $key => $value) {
			$return[$value['UniqId']]= $value['ProductRentName'];
	}
	return $return;
}


public static function makeProductId(){

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
		
		//dd($data);

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

public static function getConnection($id=false){
	if($id){

		if(self::$allOnSameconnection){
			$connection='connection';
			}else{
			$connection='connection'.$id;
			}

		
		return self::$$connection;
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

public static function migrate(){
	
			
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

			\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
			

			

		}

}

public static function rollback(){
		

			$tableNo=7;

			$tableName="table";
			$fieldName="field";
			$connectionName="connection";

		$table=self::getTable($id);


		for ($i=0; $i < $tableNo+1 ; $i++) { 

		if(self::$allOnSameconnection){
			$connection=self::getConnection();
		}else{
			$connection=self::getConnection($id);
		}
		\MS\Core\Helper\Comman::deleteTable($table,$connection);	

		}
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
