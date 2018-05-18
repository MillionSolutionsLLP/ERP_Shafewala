<?php
namespace B\MAS;


use \Illuminate\Http\Request;





class Base
{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\MAS\Controller";
public static $model="\B\M\MAS\Model";
public static $routes=[
						
						[
						'name'=>'MAS.Data',
						'route'=>'/test',
						'method'=>'test',
						'type'=>'get',
						],

////////////////////////////////////////////////////////////////////////
// Master Page Index Route Start
////////////////////////////////////////////////////////////////////////


						[
						'name'=>'MAS.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'MAS.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],															
////////////////////////////////////////////////////////////////////////
// Master Page Index Route End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Master Company Route Start
////////////////////////////////////////////////////////////////////////

						[
						'name'=>'MAS.Company.Edit',
						'route'=>'/edit/company',
						'method'=>'editCompany',
						'type'=>'get',
						],

						[
						'name'=>'MAS.Company.Edit.Post',
						'route'=>'/edit/company',
						'method'=>'editCompanyPost',
						'type'=>'post',
						],

////////////////////////////////////////////////////////////////////////
// Master Company Route End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Master Tax Route Start
////////////////////////////////////////////////////////////////////////

						[
						'name'=>'MAS.Tax.View',
						'route'=>'/view/tax',
						'method'=>'viewTax',
						'type'=>'get',
						],


						[
						'name'=>'MAS.Tax.Add',
						'route'=>'/add/tax',
						'method'=>'addTax',
						'type'=>'get',
						],


						[
						'name'=>'MAS.Tax.Add.Post',
						'route'=>'/add/tax',
						'method'=>'addTaxPost',
						'type'=>'post',
						],

						[
						'name'=>'MAS.Tax.Edit',
						'route'=>'/edit/tax/{UniqId}',
						'method'=>'editTax',
						'type'=>'get',
						],

						[
						'name'=>'MAS.Tax.Edit.Post',
						'route'=>'/edit/tax',
						'method'=>'editTaxPost',
						'type'=>'post',
						],

						[
						'name'=>'MAS.Tax.Delete',
						'route'=>'/delete/tax/{UniqId}',
						'method'=>'deleteTax',
						'type'=>'get',
						],


////////////////////////////////////////////////////////////////////////
// Master Tax Route End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Master hsn/sac Route Start
////////////////////////////////////////////////////////////////////////

						[
						'name'=>'MAS.HSN.Edit',
						'route'=>'/edit/hsn',
						'method'=>'editHSNSAC',
						'type'=>'get',
						],


						[
						'name'=>'MAS.HSN.Edit.Post',
						'route'=>'/edit/hsn',
						'method'=>'editHSNSACPost',
						'type'=>'post',
						],


////////////////////////////////////////////////////////////////////////
// Master hsn/sac Route End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Master TNC Route Start
////////////////////////////////////////////////////////////////////////			


						[
						'name'=>'MAS.TNC.Edit',
						'route'=>'/view/tnc',
						'method'=>'viewTNC',
						'type'=>'get',
						],


						[
						'name'=>'MAS.TNC.Edit',
						'route'=>'/add/tnc',
						'method'=>'addTNC',
						'type'=>'get',
						],


						[
						'name'=>'MAS.TNC.Edit.Post',
						'route'=>'/add/tnc',
						'method'=>'addTNCPost',
						'type'=>'post',
						],


						[
						'name'=>'MAS.TNC.Edit',
						'route'=>'/edit/tnc/{UniqId}',
						'method'=>'editTNC',
						'type'=>'get',
						],

						[
						'name'=>'MAS.TNC.Edit.Post',
						'route'=>'/edit/tnc',
						'method'=>'editTNCPost',
						'type'=>'post',
						],

						[
						'name'=>'MAS.TNC.Delete',
						'route'=>'/delete/tnc/{UniqId}',
						'method'=>'deleteTNC',
						'type'=>'get',
						],
////////////////////////////////////////////////////////////////////////
// Master CC Route End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Master CC Route Start
////////////////////////////////////////////////////////////////////////

	[
						'name'=>'MAS.CC.Master.Edit',
						'route'=>'/view/cc/master',
						'method'=>'viewCC',
						'type'=>'get',
						],


						[
						'name'=>'MAS.CC.Master.Edit',
						'route'=>'/add/cc/master',
						'method'=>'addCC',
						'type'=>'get',
						],


						[
						'name'=>'MAS.CC.Master.Edit.Post',
						'route'=>'/add/cc/master',
						'method'=>'addCCPost',
						'type'=>'post',
						],


						[
						'name'=>'MAS.CC.Master.Edit',
						'route'=>'/edit/cc/master/{UniqId}',
						'method'=>'editCC',
						'type'=>'get',
						],

						[
						'name'=>'MAS.CC.Master.Edit.Post',
						'route'=>'/edit/cc/master',
						'method'=>'editCCPost',
						'type'=>'post',
						],

						[
						'name'=>'MAS.CC.Master.Delete',
						'route'=>'/delete/cc/master/{UniqId}',
						'method'=>'deleteCC',
						'type'=>'get',
						],

////////////////////////////////////////////////////////////////////////
// Master TNC Route End
////////////////////////////////////////////////////////////////////////


					];


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'Year','type'=>'string','input'=>'option','callback'=>'ccYear','editLock'=>true],
['name'=>'Rate','type'=>'string','input'=>'number'],

];


public static $field1=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'NameOfBussiness','type'=>'string','input'=>'text'],
['name'=>'GstNo','type'=>'string','input'=>'text'],
['name'=>'CinNo','type'=>'string','input'=>'text'],
['name'=>'PanNo','type'=>'string','input'=>'text'],

['name'=>'AddressStreet','type'=>'string','input'=>'text'],
['name'=>'AddressRoad','type'=>'string','input'=>'text'],
['name'=>'AddressCity','type'=>'string','input'=>'text'],

['name'=>'Pincode','type'=>'string','input'=>'text'],


['name'=>'BankName','type'=>'string','input'=>'text'],
['name'=>'AccountType','type'=>'string','input'=>'text'],
['name'=>'AccountNo','type'=>'string','input'=>'number'],
['name'=>'IfscCode','type'=>'string','input'=>'text'],


['name'=>'ContactNo','type'=>'string','input'=>'number'],
['name'=>'MobileNo','type'=>'string','input'=>'number'],
['name'=>'FaxNo','type'=>'string','input'=>'number'],
['name'=>'Email','type'=>'string','input'=>'email'],


];
#accounts@kgnenterprises.com


public static $field2=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'Text','type'=>'string','input'=>'textarea'],
['name'=>'DisplayRank','type'=>'string','input'=>'text'],

];


public static $field3=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'TaxName','type'=>'string','input'=>'text'],
['name'=>'TaxRate','type'=>'string','input'=>'number'],
	

];

public static $field4=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'HsnName','type'=>'string','input'=>'text'],
['name'=>'HsnCode','type'=>'string','input'=>'number'],
	

];



public static $field5=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'Year','type'=>'string','input'=>'number'],
['name'=>'Rate','type'=>'string','input'=>'number'],

];

public static $field6=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'Starting','type'=>'string','input'=>'number'],
['name'=>'Ending','type'=>'string','input'=>'number'],
['name'=>'Rate','type'=>'string','input'=>'number'],
	

];


public static $field7=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'FirstName','type'=>'string','input'=>'text'],
['name'=>'LastName','type'=>'string','input'=>'text'],
['name'=>'Gender','type'=>'string','input'=>'option'],
['name'=>'usename','type'=>'string','input'=>'text'],
['name'=>'password','type'=>'string','input'=>'text'],
['name'=>'MobileNo','type'=>'string','input'=>'text'],
['name'=>'Email','type'=>'string','input'=>'text'],
['name'=>'Desiganation','type'=>'string','input'=>'text'],
	

];

public static $table="MAS_Master_CC_Rate";
public static $tableStatus=False;



public static $table1="MAS_Master_Company";
public static $tableStatus1=True;

public static $table2="MAS_Master_Terms_Conditions";
public static $tableStatus2=True;

public static $table3="MAS_Master_Tax";
public static $tableStatus3=True;

public static $table4="MAS_Master_HSN_Code";
public static $tableStatus4=True;

public static $table5="MAS_Master_TC_Usage_Rate";
public static $tableStatus5=False;

public static $table6="MAS_Master_TC_Fine_Rate";
public static $tableStatus6=False;

public static $table7="MAS_Master_User";
public static $tableStatus7=False;






public static $connection ="MSDBC";

public static $allOnSameconnection=true;









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


public static function ccYear(){


	$yr=\MS\Core\Helper\Comman::getYr()+1;
	
	$row=new Model();
	//dd($row->all()->toArray());
	$curyr=[];
	foreach ($row->all()->toArray() as $key => $value) {
		
		$curyr[$value['Year']]=$value['Year'];

	}


	if(array_key_exists($yr, $curyr)){

			$data=[
	
	];
		
		}else{
			$data=[
				$yr=>$yr
			];
		}

	
	

	

	for ($i=0; $i < 14; $i++) { 
		
		$yr=$yr+1;
		if(!array_key_exists($yr, $curyr)){

			$data[$yr]=$yr;
		}
		
		
	}

	

	return $data;


}	


public static function UniqId(){
	return \MS\Core\Helper\Comman::random(4,1);
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
	return \MS\Core\Helper\Comman::random(4,1);
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
	
			
			$tableNo=7;

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
