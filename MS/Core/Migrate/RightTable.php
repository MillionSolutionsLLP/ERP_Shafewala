<?php
namespace MS\Core\Migrate;


use \Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;




class RightTable
{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\Users\Controller";
public static $model="\MS\Model\RiTable";

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],
['name'=>'RightLink','type'=>'string','input'=>'text'],
['name'=>'RightTypeCode','type'=>'string','input'=>'text'],
['name'=>'RightModuleCode','type'=>'string','input'=>'text'],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];

public static $table="RightTable";

public static $connection ="MSDBC";






public static function addRole($role){

	//dd(\DB::getSchemaBuilder()->getColumnListing(self::getTable()));

	$row=\DB::getSchemaBuilder()->getColumnListing(self::getTable());

	if(in_array ($role, $row) ){


	\Schema::connection(self::getConnection())->table(self::getTable(), function (Blueprint $table) use ($role) {
    $table->dropColumn($role);
	});

	\Schema::connection(self::getConnection())->table(self::getTable(), function (Blueprint $table) use ($role) {
    $table->boolean($role)->default(false);
	});

	}else{

	\Schema::connection(self::getConnection())->table(self::getTable(), function (Blueprint $table) use ($role) {
    $table->boolean($role)->default(false);
	});

	}

}

public static function removeRole($role){

	$row=\DB::getSchemaBuilder()->getColumnListing(self::getTable());

	if(in_array ($role, $row) ){

		\Schema::connection(self::getConnection())->table(self::getTable(), function (Blueprint $table) use ($role) {
    	$table->dropColumn($role);
	});

	}

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
	//return self::$table."_".\MS\Core\Helper\Comman::getYr();
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

		$tablerolecat=\MS\Core\Migrate\RoleCatTable::seed();
		$tablerolecat=$tablerolecat->get()->pluck('RoleCatName','UniqId')->toArray();
		foreach ($tablerolecat as $key => $value) {
			$field[]=[
			'name'=>"cat_".$key,'type'=>'string'
			];
		}

		\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
}

public static function rollback(){
		$table=self::getTable();
		$connection=self::getConnection();
		\MS\Core\Helper\Comman::deleteTable($table,$connection);	
}


}


