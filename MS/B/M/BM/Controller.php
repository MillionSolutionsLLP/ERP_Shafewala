<?php
namespace B\BM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){


		//Base::migrate([['id'=>0]]);

		//Base::migrate([['id'=>0]]);

			$data=[

			

			];
		return view('BM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('BM.V.Object.MasterDetails')->with('data',$data);
		
		
	}



	public function addBooking(){

		$id=3;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Booking")->content($id)->action("addBooking")->btn([
								'action'=>"\\B\\BM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							])->js(["BM.J.booking"])->extraFrom(2,['title'=>'Product Details','multiple'=>true,]);


		return $build->view();


	}

	public function addBookingPost(R\AddBooking $r){

		$input=$r->input();

		//dd($input);

		if(($input['ProductCode'][0]!=null) and ($input['BookingQuantity'][0]!=null and $input['BookingRate'][0]!=null)){

			$product=[];
			$amount=[];
			$totalAmount=0;
			$totalQuntity=0;
			$uniq=Base::genUniqID();





			$data=[
				[
					'id'=>1,
					'code'=>$uniq
				]
			];
			$returnData=Base::migrate($data);


			
			
			

			foreach ($input['ProductCode']as $key => $value) {
				
				$model=new Model($returnData['id'],$returnData['tableName']);

				$product[$value]['BookingAmount']=$input['BookingRate'][$key]*$input['BookingQuantity'][$key];
				$totalAmount=$totalAmount+$product[$value]['BookingAmount'];
				$totalQuntity=$totalQuntity+$input['BookingQuantity'][$key];

				$rData=[
				'ProductCode'=>$value,
				'ProductRate'=>$input['BookingRate'][$key],
				'ProductQuantity'=>$input['BookingQuantity'][$key],
				'ProductLost'=>0,

				];


				$model->MS_add($rData,$returnData['id'],$uniq);

			}




			$arraReturn=[

				'UniqId'=>$uniq,
				'BookingDate'=>$input['BookingDate'],
				'BookingParty'=>$input['BookingParty'],
				'BookingStatus'=>$input['BookingStatus'],
				'BookingAmount'=>$totalAmount,
				'BookingRate'=>$totalAmount/$totalQuntity,
				'BookingAmountPaid'=>0,
				'BookingLost'=>0,
				'BookingLostAmount'=>0,
				'BookingContactNo'=>$input['BookingContactNo'],

			];

			$status=200;
			$tableId=0;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_add($arraReturn,$tableId);








			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\BM\Controller@addBooking'),
			 		'data'=>$input,
			 		'array'=>$arraReturn

				];

	
		 return response()->json($array, $status);
		}

		$array=[

			'msg'=>[
				'ProductCode'=>'atleast 1 Product Details must be added '

			],

		];

		 $status=501;
		 return response()->json($array, $status);

		//return false;


	}


	public function editBooking($UniqId){

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

			$build->title("Edit Booking ")->content($id,$data)->action("editBookingPost");

			$build->btn([
									'action'=>"\\B\\BM\\Controller@indexData",
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

	public function editBookingPost(R\EditBooking $r){


			$id=0;
			$status=200;
			$rData=$r->all();
			$model=new Model();
			$model->MS_update($rData,$id);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\BM\Controller@indexData'),
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}



	public function  closeBookingForm(){

			$id=5;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Close Booking")->content($id)->action("addBooking")->
								btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Close"
							]);


		return $build->view();

	}


	public function viewAllBooking(){

		$model=new Model();

		if($model->get() == null){
			$tableData=[];
		}else{
			$tableData=$model->get()->sortBy('BookingDate')->toArray();	
		}
		
	
		$data=[

			'table'=>$tableData,
		];

		//dd($data);
		return view("BM.V.Object.ViewAllList")->with('data',$data);

	}




}