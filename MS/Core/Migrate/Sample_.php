<?php
namespace MS\Core\Migrate;


use \Illuminate\Http\Request;

class Sample{




///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'RowId','type'=>'string','input'=>'text'],

['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];

public static $table="RoleCatTable";

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