<?php
namespace B\IVR;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			Base::migrate([['id'=>0]]);


			$data=[

			

			];
		return view('IVR.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('IVR.V.Object.MasterDetails')->with('data',$data);
		
		
	}


public function notify(Request $r)
{		

			$tableId=0;

			$rData=$r->all();

			$rData['UniqId']=\MS\Core\Helper\Comman::random(2,1);

			//$rData=$rData['Call'];
			//dd($rData);

			//\Storage::disk('MS-MASTER-CORE')->put('file.text', (string)$rData);
			  \Log::info($rData);
			$rDatav=[

				'UniqId'=>$rData['UniqId'],

				'Sid'=>$rData['CallSid'],

				'To'=>$rData['CallTo'],

				'From'=>$rData['CallFrom'],

				'PhoneNumberSid'=>$rData['From'],

				'SDurationid'=>$rData['DialCallDuration'],

			

				];
			
			$model=new Model();
			$model->MS_add($rDatav,$tableId);



}

}