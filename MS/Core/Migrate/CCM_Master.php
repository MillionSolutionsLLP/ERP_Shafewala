<?php
namespace MS\Core\Migrate;


use \Illuminate\Http\Request;

class CCM_Master{




///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $field=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'NameOfUnit','type'=>'string','input'=>'text'],
['name'=>'MemberMasterId','type'=>'string','input'=>'text'],
['name'=>'Booked','type'=>'string','input'=>'text'],
['name'=>'BookingUsed','type'=>'string','input'=>'text'],
['name'=>'NumberOfInstalment','type'=>'string','input'=>'text'],
['name'=>'AmountPaid','type'=>'string','input'=>'text'],
['name'=>'AmountBalance','type'=>'string','input'=>'text'],
['name'=>'CurrentRate','type'=>'string','input'=>'text'],
['name'=>'DetailedLadgerId','type'=>'string','input'=>'text'],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],


];



public static $field1=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'PaymentId','type'=>'string','input'=>'text'],
['name'=>'PaymentRecivedBy','type'=>'string','input'=>'text'],
['name'=>'PaymentType','type'=>'string','input'=>'text'],
['name'=>'Amount','type'=>'string','input'=>'text'],
['name'=>'NumberOfInstalment','type'=>'string','input'=>'text'],
['name'=>'AmountBalance','type'=>'string','input'=>'text'],

];


public static $field2=[

['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],

['name'=>'Intrest','type'=>'string','input'=>'text'],
['name'=>'Instalment','type'=>'string','input'=>'text'],
['name'=>'PrincipalAmount','type'=>'string','input'=>'text'],
['name'=>'IntrestAmount','type'=>'string','input'=>'text'],
['name'=>'PaymentStatus','type'=>'string','input'=>'text'],
['name'=>'PaymentId','type'=>'string','input'=>'text'],

];




public static $table="CCM_Master";

public static $table1="CCM_Master_DetailedLedger_";
public static $table2="CCM_Master_InstalmentLedger_";




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
		return self::$table.$id;
		}else{
		return self::$table;
	}
}

public static function getConnection($id=false){
	if($id){
		return self::$connection.$id;
		}else{
		return self::$connection;
	}
}

public static function getField($id=false){
	if($id){
		return self::$field.$id;
	}else{
	return self::$field;	
	}
	
}
public static function seed(){
	return \DB::connection(self::getConnection())->table(self::getTable());
}

public static function migrate(){
		$table=self::getTable();
			
			$tableNo=0;

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