<?php
namespace B\MAS;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
            $this->middleware('backend');
    }
	public function index(){


		$modelCompany=new Model(1);

		$company=$modelCompany->get()->toArray();

		$lastconfig=count($company)-1;
		if($lastconfig > 1){
		$secondlastconfig=count($company)-2;	
	}else{
		$secondlastconfig=$lastconfig;
	}
		
		//dd($company);


			

		$data=[
			'Master_Company_current'=>$company[$lastconfig],
			'Master_Company_last'=>$company[$secondlastconfig]

		];
			return view('MAS.V.panel_data')->with('data',$data);
	}

	public function indexData(){


		$modelCompany=new Model(1);

		$company=$modelCompany->get()->toArray();

		$lastconfig=count($company)-1;
		if($lastconfig > 1){
		$secondlastconfig=count($company)-2;	
	}else{
		$secondlastconfig=$lastconfig;
	}
		
		//dd($company);


			

		$data=[
			'Master_Company_current'=>$company[$lastconfig],
			'Master_Company_last'=>$company[$secondlastconfig]

		];
			return view('MAS.V.Object.MasterDetails')->with('data',$data);
	}

	public function viewTax(){

		$model=new Model(3);

		$data=[

			'table'=>$model->get()->toArray()
		];

		return view('MAS.V.Pages.viewTax')->with('data',$data);


	}

	public function addTax(){

		$id=3;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Tax ")->content($id)->action("addTaxPost");

		$build->btn([
								'action'=>"\\B\\MAS\\Controller@viewTax",
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

// "Million" group is the exclusive source of a particular “solution” that is indispensable or necessary for undertaking the Project
	}

	public function addTaxPost(R\TaxAdd $r){
		$status=200;
			$tableId=3;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_add($rData,$tableId);	
			$array=[
	 		'msg'=>"OK",
	 	
	 		'redirectData'=>action('\B\MAS\Controller@viewTax'),
			];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
		
	}


	public function deleteTax($UniqId){
		$status=200;
			$tableId=3;
			$rData=['UniqId'=>\MS\Core\Helper\Comman::de4url($UniqId)];
			$model=new Model($tableId);
			$model->MS_delete($rData,$tableId);	
			return  $this->viewTax();

	}

	public function editTax($UniqId){

			$status=200;
			$tableId=3;
			$model=new Model($tableId);
			$rData=['UniqId'=>\MS\Core\Helper\Comman::de4url($UniqId)];
			$formData=$model->where("UniqId",$rData['UniqId']) ->get()->first()->toArray();
			$formdata=Base::genFormData(true,$formData,3);
			$formClass=\MS\Core\Helper\DForm::display($formdata);
			
			$data=[

				'form-title'=>"Edit Tax Details",
				'form-content'=>$formClass,
				
				'frm-action'=>"\B\MAS\Controller@editTaxPost",
				"form-btn"=>[

								[
									'action'=>"\\B\\MAS\\Controller@viewTax",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								],
								
								[
									//'action'=>"\\B\\MAS\\Controller@editCompany",
									'color'=>"btn-success",
									'icon'=>"fa fa-floppy-o",
									'text'=>"Save"
								],
								],

			];

			return view("B.L.Pages.Form_data")->with('data',$data);
			}

	public function editTaxPost(R\TaxAdd $r){

			$status=200;
			$tableId=3;
			$rData=$r->all();




			$model=new Model($tableId);


		
			$model->MS_update($rData,$tableId);	

			

			



			//return ;
			$array=[
	 		'msg'=>"OK",
	 	//	'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'redirectData'=>action('\B\MAS\Controller@viewTax'),



	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
		return $r;
	}		
	public function editHSNSAC(){


		$id=4;
		$model=new Model($id);

		$formData=$model->get()->toArray();

		//dd(count($formData));
		//dd($formData=!null);
		if(count($formData)>0){
				
				if(count($formData)>1){

					$last=count($formData)-1;

				}else{
					
					$last=0;

				}
				
				
			
			$formdata=Base::genFormData(true,$formData[$last],$id);
		}

		else{
			$formdata=Base::genFormData(false,[],$id);
		}

		

		$formClass=\MS\Core\Helper\DForm::display($formdata);

		//dd($formClass);

		$data=[

			'form-title'=>"Edit HSN/SAC Details",
			'form-content'=>$formClass,
			'form-btn'=>[],
			'frm-action'=>"\B\MAS\Controller@editHSNSAC",
			"form-btn"=>[

							[
								'action'=>"\\B\\MAS\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							],
							
							[
								//'action'=>"\\B\\MAS\\Controller@editCompany",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							],
							],

		];

		return view("B.L.Pages.Form_data")->with('data',$data);



	}
		
	public function addHSNSACPost(R\HSN $r){

			$status=200;
			$tableId=4;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_add($rData,$tableId);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\MAS\Controller@editHSNSAC'),
			];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}

	public function editHSNSACPost(R\HSN $r){

			$status=200;
			$tableId=4;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_update($rData,$tableId);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\MAS\Controller@editHSNSAC'),

	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);

	}



	public function viewTNC(){


		$model=new Model(2);

		$data=[

			'table'=>$model->get()->toArray()
		];

		return view('MAS.V.Pages.viewTNC')->with('data',$data);


	}


	public function editTNC($UniqId){


			$status=200;
			$id=2;

			$model=new Model($id);
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray();
			//dd($data);

			$build->title("Add Terms & Conditions ")->content($id,$data)->action("editTNCPost");

			$build->btn([
									'action'=>"\\B\\MAS\\Controller@viewTNC",
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



	
	public function editTNCPost(R\TNC $r){

			$status=200;
			$tableId=2;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_update($rData,$tableId);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\MAS\Controller@viewTNC'),

	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);



	}

	public function addTNC(){

		$id=2;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Terms & Conditions ")->content($id)->action("addTNC");

		$build->btn([
								'action'=>"\\B\\MAS\\Controller@viewTNC",
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


	public function addTNCPost(R\TNC $r){


			$status=200;
			$tableId=2;
			$rData=$r->all();
			$model=new Model($tableId);
			$model->MS_add($rData,$tableId);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\MAS\Controller@viewTNC'),

	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}

	public function deleteTNC($UniqId){
		$status=200;
			$tableId=2;
			$rData=['UniqId'=>\MS\Core\Helper\Comman::de4url($UniqId)];
			$model=new Model($tableId);
			$model->MS_delete($rData,$tableId);	
			return  $this->viewTNC();

	}


	public function editCompany(){





		$model=new Model(1);

		$formData=$model->get()->toArray();

		$last=count($formData)-1;

		$formdata=Base::genFormData(true,$formData[$last],1);

		$formClass=\MS\Core\Helper\DForm::display($formdata);

		//dd($formClass);

		$data=[

			'form-title'=>"Edit Company Details",
			'form-content'=>$formClass,
			'form-btn'=>[],
			'frm-action'=>"\B\MAS\Controller@editCompany",
			"form-btn"=>[

							[
								'action'=>"\\B\\MAS\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							],
							
							[
								//'action'=>"\\B\\MAS\\Controller@editCompany",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							],
							],

		];

		return view("B.L.Pages.Form_data")->with('data',$data);





	}


	public function editCompanyPost(R\CompanyEdit $r){
			$status=200;
			$tableId=1;
			$rData=$r->all();




			$model=new Model($tableId);


			if($model->MS_Check_Last($tableId,$rData)){
			$model->MS_update($rData,$tableId);	
			}

			



			//return ;
			$array=[
	 		'msg'=>"OK",
	 	//	'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'redirectData'=>action('\B\MAS\Controller@editCompany'),

	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
		return $r;


	}



	//////////////////////////////////////////////////////////////////////
	//CC Master 
	//////////////////////////////////////////////////////////////////////


	public function viewCC(){

			$model=new Model();

		$data=[

			'table'=>$model->get()->sortBy('Year')->toArray()
		];
		//dd($data);

		return view('MAS.V.Pages.viewCC')->with('data',$data);


	}
	public function addCC(){

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Yearly Rate ")->content($id)->action("addCC");

		$build->btn([
								'action'=>"\\B\\MAS\\Controller@viewCC",
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
	public function addCCPost(R\CC $r){



			$status=208;
			//$tableId=2;
			$rData=$r->all();
			$model=new Model();
			$model->MS_add($rData);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectData'=>action('\B\MAS\Controller@viewCC'),
			];

	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
	}
	public function editCC($UniqId){


		//dd($UniqId);

		//	dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());

			$id=0;
			$model=new Model();
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray();
			
			//dd($data);

			$build->title("Edit Yearly Rate For CC ")->content($id,$data)->action("editCCPost");

			$build->btn([
									'action'=>"\\B\\MAS\\Controller@viewCC",
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
	public function editCCPost(R\CC $r){
		$status=200;
			$rData=$r->all();

			//dd($rData);


			$model=new Model();
			$model->MS_update($rData,0);	

			



			//return ;
			$array=[
	 		'msg'=>"OK",
	 	//	'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'redirectData'=>action('\B\MAS\Controller@viewCC'),

	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
	}
	public function deleteCC(){}




	public function test(){

		dd(Model::getCompanyName());
	}

}