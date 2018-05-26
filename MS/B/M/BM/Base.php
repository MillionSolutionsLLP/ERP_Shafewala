<?php
namespace B\BM;


use \Illuminate\Http\Request;





class Base{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\BM\Controller";
public static $model="\B\M\BM\Model";


public static $routes=[
						[
						'name'=>'BM.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'BM.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],
					
						[
						'name'=>'BM.Data',
						'route'=>'/booking/add',
						'method'=>'addBooking',
						'type'=>'get',
						],


						[
						'name'=>'BM.Data',
						'route'=>'/booking/add',
						'method'=>'addBookingPost',
						'type'=>'post',
						],


						[
						'name'=>'BM.Data',
						'route'=>'/booking/edit/{UniqId}',
						'method'=>'editBooking',
						'type'=>'get',
						],

						[
						'name'=>'BM.Data',
						'route'=>'/booking/edit/',
						'method'=>'editBookingPost',
						'type'=>'post',
						],


						[
						'name'=>'BM.Data',
						'route'=>'/booking/close',
						'method'=>'closeBookingForm',
						'type'=>'get',
						],


						[
						'name'=>'BM.Data',
						'route'=>'/booking/all',
						'method'=>'viewAllBooking',
						'type'=>'get',
						],


						[
						'name'=>'BM.Data',
						'route'=>'/booking/close/',
						'method'=>'closeBookingStep2',
						'type'=>'post',
						],



						[
						'name'=>'BM.Data',
						'route'=>'/booking/close/{UniqId}',
						'method'=>'closeBookingById',
						'type'=>'get',
						],


							[
						'name'=>'BM.Data',
						'route'=>'/booking/close/final',
						'method'=>'closeBookingFinal',
						'type'=>'post',
						],

						


						
					
					];


public static $tableNo="0";



//public static $connection ="MSDBC";

public static $allOnSameconnection=false;



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table="BM_Booking";

public static $connection ="BM_Master";

public static $tableStatus=false;

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],


['name'=>'BookingDate','type'=>'string','input'=>'date',  ],


['name'=>'BookingParty','type'=>'string','input'=>'text',  ],
['name'=>'BookingContactNo','type'=>'string','input'=>'text',  ],


['name'=>'BookingStatus','type'=>'string','input'=>'option', 'callback'=>'BookingStatus' ],


['name'=>'BookingAmount','type'=>'string','input'=>'number',  ],

['name'=>'BookingRate','type'=>'string','input'=>'number',  ],


['name'=>'BookingAmountPaid','type'=>'string','input'=>'number',  ],

['name'=>'BookingLost','type'=>'string','input'=>'number',  ],

['name'=>'BookingLostAmount','type'=>'string','input'=>'number',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table1="BM_Booking_";

public static $connection1 ="BM_Data";

public static $tableStatus1=false;

public static $field1=[
['name'=>'UniqId','type'=>'string','input'=>'auto','value'=>'genUniqID','default'=>'genUniqID',],


['name'=>'ProductCode','type'=>'string','input'=>'number' ,'link'=>'PM:0' ],


['name'=>'ProductRate','type'=>'string','input'=>'number',],


['name'=>'ProductQuantity','type'=>'string','input'=>'number',  ],

['name'=>'ProductLost','type'=>'string','input'=>'number',  ],




];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////







////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table2="BM_Booking_";

public static $connection2 ="BM_Data";

public static $tableStatus2=false;

public static $field2=[
['name'=>'ProductCode','type'=>'string','input'=>'text', 'link'=>'PM:0' ],



['name'=>'BookingQuantity','type'=>'string','input'=>'number',  ],

['name'=>'BookingRate','type'=>'string','input'=>'number',  ],	

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table3="BM_Booking_";

public static $connection3 ="BM_Data";

public static $tableStatus3=false;

public static $field3=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],


['name'=>'BookingDate','type'=>'string','input'=>'date',  ],


['name'=>'BookingParty','type'=>'string','input'=>'text',  ],
['name'=>'BookingContactNo','type'=>'string','input'=>'number',  ],


['name'=>'BookingStatus','type'=>'string','input'=>'option', 'callback'=>'BookingStatus' ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table4="BM_Status";

public static $connection4 ="BM_Master";

public static $tableStatus4=false;

public static $field4=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],



['name'=>'Name','type'=>'string','input'=>'text',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table5="BM_Status";

public static $connection5 ="BM_Master";

public static $tableStatus5=false;

public static $field5=[

['name'=>'BookingId','type'=>'string','input'=>'text',  'link'=>'BM:0'],



];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table6="BM_Booking";

public static $connection6 ="BM_Master";

public static $tableStatus6=false;

public static $field6=[

['name'=>'ProductCode','vName'=>"Order ID, Product Code, Name, Quantity",'type'=>'string','input'=>'text', 'editLock'=>true ],



['name'=>'ProductRate','vName'=>"Lost Rate",'type'=>'string','input'=>'number',  ],

['name'=>'ProductQuantity','vName'=>"Lost Quantity",'type'=>'string','input'=>'number',  ],	






];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////

















////////////////////////////////////
/////////////////////////////////////
//MODEL CALLBACK FUNCTIONS///////////
///////////////////////////////////
/////////////////////////////////




public static function status(){
	return [
	'Active','Disable'
	];
}



public static function BookingStatus(){
		
	$model=new Model(4);
	return $model->get()->pluck('Name','UniqId')->toArray();

	return [
	'Lead','Confirmed','Open','Closed',
	];
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
			
	


		$v=$model->where(array_keys($data)[0],$data[array_keys($data)[0]])->first();

		if($v!=null){
			$v=$v->toArray();
		}else{
			$v=$data;
		}
		

		if($id){
		
				$field="field".$id;
				foreach (self::$$field as $value) {
				//dd($v);
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
			
			
		//	dd($array);

			
			}
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('editLock', $data))$array['editLock']=$data['editLock'];
			break;

		case 'email':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'default'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;

		case 'number':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;
		case 'option':


			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'data'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];

			if(array_key_exists('editLock', $data))$array['editLock']=$data['editLock'];
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