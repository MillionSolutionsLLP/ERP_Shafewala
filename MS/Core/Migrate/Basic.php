<?php 
namespace MS\Core\Migrate;

class Basic {


	public static function migrate(){

		// \B\Company\Base::migrate();
		\B\Users\Base::migrate();
		\B\MAS\Base::migrate();
		// \B\MM\Base::migrate();
		\B\PM\Base::migrate();


		\B\IM\Base::migrate();
		// ProcessTypeTable::migrate();
		// ProcessTable::migrate();
		
		//RoleCatTable::migrate();
		//RoleTable::migrate();

		//RightTable::migrate();
		//AccessTable::migrate();
		//MAS_Master::migrate();
		//MEM_Master::migrate();
		//CCM_Master::migrate();


	}

	public static function rollback(){

		// \B\Company\Base::rollback();		
		 \B\Users\Base::rollback();
		 \B\MAS\Base::rollback();
		// \B\MM\Base::rollback();
		 \B\PM\Base::rollback();
		// ProcessTypeTable::rollback();
		// ProcessTable::rollback();
		//RightTable::rollback();
		//RoleCatTable::rollback();
		//RoleTable::rollback();
		//AccessTable::rollback();
		//MAS_Master::rollback();
		//MEM_Master::rollback();
		//CCM_Master::rollback();
	}




}


?>