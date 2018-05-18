<?php
namespace B\IM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){
		

			$data=[

				'addStockForm'=>$this->addWard()

			];
		return view('IM.V.panel_data')->with('data',$data);
		

	}



	public function indexData(){
		

			$data=[

				
				'addStockForm'=>$this->addWard()
			];
		return view('IM.V.Object.MasterDetails')->with('data',$data);
		

	}


	public function addWard(){

		$id=2;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add IN/OUT Entry")->content($id)->action("addWard")->btn([
								'action'=>"\\B\\IM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							]);

		return $build->view();

	}


	public function addWardPost(R\Ward $r){
			//Base::migrate(2);

			$status=200;
			$tableId=2;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_add($rData,$tableId);


			if($rData['TransactionType']){


				$data=[
				[
					'id'=>4,
					'code'=>$rData['ProductCode']
				]
			];

			$returnData=Base::migrate($data);

			//dd($returnData);

			$stockAMount=$rData['TransactionAmount'];
			$WarehouseCode=$rData['WarehouseCode'];


			for ($i=0; $i < $stockAMount ; $i++) { 

				$rData=[
					'UniqId'=>$r->all()['ProductCode'].Base::genUniqID(2,1),
					'TransactionCode'=>$r->all()['UniqId'],
					'WarehouseCode'=>$r->all()['WarehouseCode'],
					'Rented'=>false,
				];

				$model=new Model($returnData['id'],$returnData['tableName']);
				$model->MS_add($rData,$returnData['id'],$r->all()['ProductCode']);

			}


			$model=new Model(1,$WarehouseCode);
			

			if($model->where('ProductCode',$r->all()['ProductCode']) == null){
				$lastStock=0;
			}else{
				$lastStock=$model->where('ProductCode',$r->all()['ProductCode'])->pluck('ProductStock')->first();
			}

			
			$data=[

				'UniqId'=>Base::genUniqID(2,1),
				'ProductCode'=>$r->all()['ProductCode'],
				'ProductStock'=>$lastStock+$stockAMount,

			];

			//$model->update($data,$id,$WarehouseCode);		

						

				// WarehouseCode

				// if(){

				// }


			}


			


			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\IM\Controller@indexData'),

			];


			if($r->all()['TransactionType']){
				$array['redirectData']=action('\B\IM\Controller@addWardPrint',['UniqId'=>\MS\Core\Helper\Comman::en4url($r->all()['UniqId'])]);
			}

	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}




		
	public function addWardPrintout($UniqId){

		$code=\MS\Core\Helper\Comman::de4url($UniqId);
		$id=2;

		$model=new Model($id);

		$ProductCode=$model->where('UniqId',$code)->pluck('ProductCode')->first();

		$model=new \B\PM\Model();

		$ProductName=$model->where('UniqId',$ProductCode)->pluck('ProductName')->first();

		$ProductType=$model->where('UniqId',$ProductCode)->pluck('ProductTypeCode')->first();

		$model=new \B\PM\Model(1);
		$ProductType=$model->where('UniqId',$ProductType)->pluck('ProductTypeName')->first();




		$id=4;
		$model=new Model($id,$ProductCode);
		$list=$model->get()->groupBy('TransactionCode')->toArray()[$code];	
		

		//echo \DNS1D::getBarcodeSVG($code, "C39");

			$data=[

				
				'products'=>$list,
				'TransactionCode'=>$UniqId,
				'productDetails'=>['name'=>$ProductName,'type'=>$ProductType],
			];
		return view('IM.V.Pages.ProductSticker')->with('data',$data);


		// $data=[


		// 	"date"         =>"20/03/2018", // The date when the check is first eligible to be cashed/deposited. e.g. 05/01/2013
		// "payTo"         => "Million Solutions LLP", // To whom the check should be made out. e.g. Michael Harry Scepaniak
		// "amountNbr"     => "1000", // The amount of the check, as a number. e.g. 13,100.00
		// "amountTxt"     => "One Thousand", // The amount of the check, written out long-form. e.g. Thirteen thousand one hundred and 00/100
		
		// "memo"=>"Thank you for doing bussiness with us."

		// ];
		// return view('IM.V.Pages.checkSample')->with('data',$data);



	}

	public function WardPrint (){


		return view("IM.V.Object.RecentTran");

	}

	public function addWardPrint($UniqId){

		$code=\MS\Core\Helper\Comman::de4url($UniqId);
		$id=2;

		$model=new Model($id);

		$ProductCode=$model->where('UniqId',$code)->pluck('ProductCode')->first();

		$id=4;
		$model=new Model($id,$ProductCode);
		//var_dump($code);
		//dd($model->get()->groupBy('TransactionCode')->toArray()[$code]);
		$list=$model->get()->groupBy('TransactionCode')->toArray()[$code];	
		

		//echo \DNS1D::getBarcodeSVG($code, "C39");

			$data=[

				
				'products'=>$list,
				'TransactionCode'=>$UniqId,
			];
		return view('IM.V.Object.ProductSticker')->with('data',$data);
		

		//dd($code);

	}

	public function addWarehouse(){

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Warehouse")->content($id)->action("addWarehouse");

		$build->btn([
								'action'=>"\\B\\IM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							]);
		$build->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							]);

		return $build->view();
	}


	public function addWarehousePost(R\Warehouse $r){


			$status=200;
			$tableId=0;
			$rData=$r->all();
			$model=new Model();
			$model->MS_add($rData,$tableId);

			$data=[
				[
					'id'=>1,
					'code'=>$rData['UniqId']
				]
			];

			Base::migrate($data);

			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\IM\Controller@indexData'),
			];

	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);

	}



	public function editWarehouse($UniqId){
			$id=0;
			$model=new Model();
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$nullCheck=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			//dd($nullCheck);
			if($nullCheck =! null ){
				$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray();
			}else{
				$data=[];
			}
			
			
			//dd($data);

			$build->title("Edit Warehouse ")->content($id,$data)->action("editWarehousePost");

			$build->btn([
									'action'=>"\\B\\IM\\Controller@indexData",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								]);
			$build->btn([
									//'action'=>"\\B\\MAS\\Controller@editCompany",
									'color'=>"btn-success",
									'icon'=>"fa fa-floppy-o",
									'text'=>"Save"
								]);

			return $build->view();

	}

	public function editWarehousePost(R\Warehouse $r){

			$id=0;
			$status=200;
			$rData=$r->all();
			$model=new Model();
			$model->MS_update($rData,$id);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\IM\Controller@indexData'),
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);

	}

	public function deleteWarehouse($UniqId){

			$tableId=0;
			$rData=['UniqId'=>\MS\Core\Helper\Comman::de4url($UniqId)];
			$model=new Model($tableId);

			
			$model->MS_delete($rData,$tableId);


			$data=[
				[
					'id'=>1,
					'code'=>$rData['UniqId']
				]
			];

			$base=Base::rollback($data);


			return  $this->indexData();

	}	
}