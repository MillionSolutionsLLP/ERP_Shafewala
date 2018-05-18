<?php
namespace MS\Core\Migrate;


use \Illuminate\Http\Request;

class MEM_Master{




///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'NameOfUnit','type'=>'string','input'=>'text'],
['name'=>'PlotNo','type'=>'string','input'=>'text'],
['name'=>'ConnectionNo','type'=>'string','input'=>'text'],

['name'=>'GstNo','type'=>'string','input'=>'text'],
['name'=>'Cin','type'=>'string','input'=>'text'],
['name'=>'PanNo','type'=>'string','input'=>'text'],


['name'=>'AddressStreet','type'=>'string','input'=>'text'],
['name'=>'AddressRoad','type'=>'string','input'=>'text'],
['name'=>'AddressCity','type'=>'string','input'=>'text'],

['name'=>'Pincode','type'=>'string','input'=>'text'],


['name'=>'ContactNo','type'=>'string','input'=>'text'],
['name'=>'MobileNo','type'=>'string','input'=>'text'],
['name'=>'FaxNo','type'=>'string','input'=>'text'],
['name'=>'Email','type'=>'string','input'=>'text'],


['name'=>'CcLedgerId','type'=>'string','input'=>'text'],
['name'=>'TcLedgerId','type'=>'string','input'=>'text'],

];

public static $table="MEM_Master";

public static $connection ="MSDBC";



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


public static function getTable(){
	return self::$table;
	return self::$table."_".\MS\Core\Helper\Comman::getYr();
}

public static function getConnection(){
	return self::$connection;
}

public static function getField(){
	return self::$field;
}


public static function seed(){
	return \DB::connection(self::getConnection())->table(self::getTable());
}

public static function migrate(){
		$table=self::getTable();
		$connection=self::getConnection();
		$field=self::getField();
		//self::checkDB($connection);
		\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
}

public static function rollback(){
		$table=self::getTable();
		$connection=self::getConnection();
		\MS\Core\Helper\Comman::deleteTable($table,$connection);	
}




}