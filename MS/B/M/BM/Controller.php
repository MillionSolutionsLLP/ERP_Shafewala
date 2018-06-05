<?php
namespace B\BM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){



			   $model=new Model(0);
			   $data=$model->where('BookingStatus','2')->get();

			   $model1=new Model(0);
			   $data1=$model1->where('BookingStatus','0')->orWhere('BookingStatus','1')->get();


			   $model2=new Model(0);
			   $data2=$model2->where('BookingStatus','3')->get();

			   $model3=new Model(0);
			   $data3=$model3->where('BookingStatus','1')->orWhere('BookingStatus','2')->get();

			   $model4=new Model(0);
			   $data4=$model4->get();

//	  dd($data2);

        if($data != null  )$data= $data->toArray();
        if($data1 != null  )$data1= $data1->toArray();
        if($data2 != null  )$data2= $data2->sum('BookingAmount')+$data2->sum('BookingLostAmount');
        if($data3 != null  )$data3= $data3->sum('BookingAmount')+$data3->sum('BookingLostAmount');
        if($data4 != null  )$data4= $data4->toArray();
		//  dd($data4);


			$data=[
				'total_open_orders'=>count($data),
				'total_upcoming_orders'=>count($data1),
				'total_received'=>$data2,
				'total_due'=>$data3,
				'total_order'=>count($data4),


			

			];
		return view('BM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			   $model=new Model(0);
			   $data=$model->where('BookingStatus','2')->get();

			   $model1=new Model(0);
			   $data1=$model1->where('BookingStatus','0')->orWhere('BookingStatus','1')->get();

			   $model2=new Model(0);
			   $data2=$model2->where('BookingStatus','3')->get();

			   $model3=new Model(0);
			   $data3=$model3->Where('BookingStatus','1')->orWhere('BookingStatus','2')->get();

			   $model4=new Model(0);
			   $data4=$model4->get();

     
	
        if($data != null  )$data= $data->toArray();
        if($data1 != null  )$data1= $data1->toArray();
        if($data2 != null  )$data2= $data2->sum('BookingAmount')+$data2->sum('BookingLostAmount');
        if($data3 != null  )$data3= $data3->sum('BookingAmount')+$data3->sum('BookingLostAmount');
         if($data4 != null  )$data4= $data4->toArray();
		


			$data=[
				'total_open_orders'=>count($data),
				'total_upcoming_orders'=>count($data1),
				'total_received'=>$data2,
				'total_due'=>$data3,
				'total_order'=>count($data4),

			

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
							])->js(["BM.J.booking"])->extraFrom(2,['title'=>'Product Details','multiple'=>true,'multipleAdd'=>true]);


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

		$build->title("Close Booking")->content($id)->action("closeBookingStep2")->btn([
									'action'=>"\\B\\BM\\Controller@indexData",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								])->
								btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"View & Close Booking"
							]);


		return $build->view();

	}


	public function closeBookingStep2(R\CloseBooking $r){

		$code=$r->all()['BookingId'];
		$model=new Model ();

		$booking=$model->where('UniqId',$code)->first()->toArray();

		$id='2';
		$model2=new Model($id,$code);

		$dbooking=$model2->get()->toArray();
		$array['Booking_Details_of_'.$booking['UniqId']]=$booking;
		foreach ($dbooking as $key => $value) {
			$value['ProductCode']=$booking['UniqId'].",".$value['ProductCode'].",".\B\PM\Model::getProductbyId($value['ProductCode'])['ProductName'].",".$value['ProductQuantity'];
			$value['ProductRate']='0';
			$value['ProductQuantity']='0';
			$dbooking[$key]=$value;
		}

		$array['Detailed_Booking']=$dbooking;
		
		
				$build=new \MS\Core\Helper\Builder (__NAMESPACE__);


		$tableArray=[

			"Booking ID"=>": ".$booking['UniqId'],
			"Booking Party Name"=>": ".$booking['BookingParty'],
			"Booking Contact No."=>": ".$booking['BookingContactNo']

		];

		$classArray=[
			'div-root-class'=>'col-lg-6',

		];

		$build->title("Close Booking")->action("closeBookingFinal")->btn([
									'action'=>"\\B\\BM\\Controller@closeBookingForm",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								])->
								btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Close Booking"
							])->heading((array)"Booking Details")->table(false,$tableArray,[],$classArray)->extraFrom('6',['title'=>'Product Details','multiple'=>true,'multipleAdd'=>false,'data'=>$array['Detailed_Booking']]);


	


		//return $build->view();


 		$status=200;
		$array=[
	 		'msg'=>"OK",
	 		'loadData'=>(string)$build->view(),
	 		];
	


	 		return response()->json($array, $status);

		//dd($dbooking);


	}



	public function closeBookingFinal(R\CloseBookingFinal $r){
		$input=$r->all();




		if(array_key_exists('_token', $input))unset($input['_token']);


		$finalArray=[];
		$oderId=false;
		foreach ($input['ProductCode'] as $key => $value) {
			
			$explArray=explode(',', $value);

			if(!$oderId)$oderId=$explArray[0];

			$finalArray[$key]['ProductCode']=$explArray[1];
			$finalArray[$key]['LostRate']=$input['ProductRate'][$key] ;
			$finalArray[$key]['LostQua']=$input['ProductQuantity'][$key] ;



		}
		$id='2';

		foreach ($finalArray as $key => $value) {
			$model=new Model($id,$oderId);

		}
		
		dd($finalArray);

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



	public function closeBookingById($UniqId){

			//$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);

			$code=\MS\Core\Helper\Comman::de4url($UniqId);
			$model=new Model ();
			$booking=$model->where('UniqId',$code)->first()->toArray();

		$id='2';
		$model2=new Model($id,$code);

		$dbooking=$model2->get()->toArray();
		$array['Booking_Details_of_'.$booking['UniqId']]=$booking;
		foreach ($dbooking as $key => $value) {
			$value['ProductCode']=$booking['UniqId'].",".$value['ProductCode'].",".\B\PM\Model::getProductbyId($value['ProductCode'])['ProductName'].",".$value['ProductQuantity'];
			$value['ProductRate']='0';
			$value['ProductQuantity']='0';
			$dbooking[$key]=$value;
		}

		$array['Detailed_Booking']=$dbooking;
		
		
				$build=new \MS\Core\Helper\Builder (__NAMESPACE__);


		$tableArray=[

			"Booking ID"=>": ".$booking['UniqId'],
			"Booking Party Name"=>": ".$booking['BookingParty'],
			"Booking Contact No."=>": ".$booking['BookingContactNo']

		];

		$classArray=[
			'div-root-class'=>'col-lg-6',

		];

		$build->title("Close Booking")->action("closeBookingFinal")->btn([
									'action'=>"\\B\\BM\\Controller@indexData",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								])->
								btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Close Booking"
							])->heading((array)"Booking Details")->table(false,$tableArray,[],$classArray)->extraFrom('6',['title'=>'Product Details','multiple'=>true,'multipleAdd'=>false,'data'=>$array['Detailed_Booking']]);


	


		//return $build->view();




	 		return (string)$build->view();

				
		
			

	}




}