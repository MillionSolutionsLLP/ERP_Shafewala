<?php
namespace MS\Core\Migrate;


use \Illuminate\Http\Request;

class MAS_Master{




///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'Year','type'=>'string','input'=>'text'],
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

['name'=>'Text','type'=>'string','input'=>'text'],
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
['name'=>'usename','type'=>'string','input'=>'text'],
['name'=>'password','type'=>'string','input'=>'text'],
['name'=>'MobileNo','type'=>'string','input'=>'text'],
['name'=>'Email','type'=>'string','input'=>'text'],
['name'=>'Desiganation','type'=>'string','input'=>'text'],
	

];

public static $table="MAS_Master_CC_Rate";
public static $table1="MAS_Master_Company";
public static $table2="MAS_Master_Terms_Conditions";
public static $table3="MAS_Master_Tax";
public static $table4="MAS_Master_HSN_Code";
public static $table5="MAS_Master_TC_Usage_Rate";
public static $table6="MAS_Master_TC_Fine_Rate";
public static $table7="MAS_Master_User";



public static $connection ="MSDBC";

public static $allOnSameconnection=true;



public static function addRow($rolecat){

	$table=self::seed();
	$table->insert([

		'UniqId'=>\MS\Core\Migrate\RoleCatTable::genUniqID(),
        'RowId'=>$rowid,
       	'Status'=>true

		]);

}

public static function removeRow($rowid){

	$table=self::seed();
	$table->where('RowId', '=', $rowid)->delete();

}

public static function removeRowById($rowid){

	$table=self::seed();
	$table->where('UniqId', '=', $rowid)->delete();

}


//////////////////////////////
//////////////////////////////
//DO NOT EDIT BELOW///////////
////////////////////////////
//////////////////////////


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

public static function getConnection($id=false){
	if($id){
		$connection='connection'.$id;
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
		$table=self::getTable();
			
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

			\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
			

			

		}

}

public static function rollback(){
		$table=self::getTable();
		$connection=self::getConnection();
		\MS\Core\Helper\Comman::deleteTable($table,$connection);	
}




}