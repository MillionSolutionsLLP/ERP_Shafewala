<?php
namespace B\Panel;

class Controller extends \App\Http\Controllers\Controller
{

	public function __construct(){
     

        $this->middleware('backend');
    }


	public function index(){
		//echo __('panel.urhere', ['name' => 'dayle']);
		//$demo=__('panel.urhere');
		//echo __('panel.urhere');
		//\App::setLocale('gj');
		//dd( $demo);

		return view('Panel.V.home');
	}

	public function index_data(){
		//echo __('panel.urhere', ['name' => 'dayle']);
		//$demo=__('panel.urhere');
		//echo __('panel.urhere');
		//\App::setLocale('gj');
		//dd( $demo);
		$data=[
		'title'=>'Dashboard',
		'icon'=>'fa fa-tachometer',
		'content'=>view('Panel.V.home_data'),
		];
		return view('B.L.Data')->with('data',$data);
	}

	

}