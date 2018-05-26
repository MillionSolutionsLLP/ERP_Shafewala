<?php 
namespace MS\Core\Helper;

class Builder{


	public function __construct($namespace){

		$this->namespace=$namespace;
		$this->content='';
		$this->form_id="";
		$this->form=0;
		$this->index=0;
		//$this->multiple=false;

		

	}

	public $title,$content,$action,$btn,$namespace;

	public static $layoutB ="B.L.Pages.Form_data";
	public static $layoutF ="B.L.Pages.Form_data";
	public function title($text){

		$this->title=$text;



		return $this;
	}

	public function content($id,$data=[],$formdataArray=[]){

		
		$class=[
			'',
			$this->namespace,
			'Base'
		];



		$base=implode('\\', $class);

		if(count($data)>0){

			$formdata=$base::genFormData(true,$data,$id);			
			//dd($formdata);
		}else{
			$formdata=$base::genFormData(false,$data,$id);	
		}


		$this->index=$this->index+count($formdata);


		if(isset($this->form_multiple))
		{

			
				foreach ($formdata as $key=>$value) {
					//dd($value);
					if(!array_key_exists('vName', $value))$value['vName']=$value['lable'];
					
					$value['name']=$value['name']."[]";
					//dd($value);
					$value['index']=$this->index;
					$formdata2[]=$value;

				}
				//dd($formdata2);
				$formdata=$formdata2;
			
			}
		//

			//if($this->content=='')$this->content="<div class=' col-lg-12'>";

		if($this->form>0){

			$this->content.="<div class='ProductDetails' >";
			$this->content.=\MS\Core\Helper\DForm::display($formdata,$formdataArray);	}
		else{

		$this->content.="<div class='row'>".\MS\Core\Helper\DForm::display($formdata,$formdataArray)."</div>";	
		}
		
		


		return $this;


	}

	public function action($method){
		
		$class=[
			'',
			$this->namespace,
			'Controller'
		];

		$class=[
			implode('\\', $class),
			$method
		];
		$class=implode('@', $class);
		//dd($class);
		$this->action=$class;

		return $this;

	}

	public function btn($array){

		$this->btn[]=$array;
		return $this;

	}

	public function js($array){
		$this->js=$array;
		return $this;
	}


	public function heading($array){

		foreach ($array as $key => $value) {
		$this->content.="<div class='col-lg-12'><h3>".$value."</h3></div>";
		return $this;
		}

	}

	public function table($vertical=true,$array,$cloumnArray=[],$class=[]){

		if(!array_key_exists('div-root-class', $class))$class['div-root-class']="col-lg-12";
		if(!array_key_exists('table-class', $class))$class['table-class']="table";


		$this->content.="<div class='".$class['div-root-class']."'>";

		$this->content.="<table class='".$class['table-class']."'>";

		if($vertical){
			$this->content.="<tr>";

			foreach ($cloumnArray as  $value) {
				
				$this->content.="<tr>";

				$this->content.="<th>";

				$this->content.=ucfirst($value);

				$this->content.="</th>";

				$this->content.="</tr>";
			}
		
			$this->content.="</tr>";

		}else{

			foreach ($array as $key => $value) {
				

				$this->content.="<tr>";

				$this->content.="<th>";

				$this->content.=ucfirst($key);

				$this->content.="</th>";

				$this->content.="<td>";

				$this->content.=ucfirst($value);

				$this->content.="</td>";

				$this->content.="</tr>";



			}


		}
		


		$this->content.="</table>";
		$this->content.="</div>";
		return $this;

	}


	public function extraFrom($id,$data=[]){

		$this->form=$this->form+1;

		if(array_key_exists('title', $data))
		$title=$data['title'];

		if (isset($title)) {



			if(array_key_exists('multiple', $data)){

			if($data['multiple']){
				$this->form_multiple=true;
				$this->form_id=preg_replace('/\s+/', '', $data['title']);

				if(array_key_exists('multipleAdd', $data)){

					if($data['multipleAdd']){

							$this->content.='<div class="col-lg-12"><h3>' .$title.'<span ms-id="'.$this->form.'" class="btn btn-default btn-success glyphicon glyphicon-plus pull-right AddSectionBtn"></span></h3></div>';
					}else{
						goto end;
					}
				


				}else{

					end:
					$this->content.='<div class="col-lg-12"><h3>' .$title.'</h3></div>';

				}



			}

		    }

		
		}else{
			//$this->content.="<div class='col-lg-12'></div>";
		}
		
		$data2=[
			'form-class-div'=>"col-lg-3",
			//'form-class-id'=>$id

		];

		$cdata=[];



		if(array_key_exists('data', $data))

		{
				$cdata=$data['data'];
				if(is_array($cdata)){

					foreach ($cdata as $key => $value) {

						$this->content($id,$value,$data2);
						$this->content.="</div>";
					}

				}


		}else{

			$this->content($id ,$cdata,$data2);

		}


		
		

		//return $this;


	}
	

	public function view ($backend=false){


		// if($this->form_multiple)$this->content=$this->content.'<span ms-id="'.$this->form.'" class="btn btn-default btn-danger glyphicon glyphicon-remove pull-right RemoveSectionBtn"></span>';

		$data=[

			'form-title'=>$this->title,
			'form-content'=>$this->content,//."</div>",
			'frm-action'=>$this->action,
			"form-btn"=>$this->btn,
			//"form-js"=>$this->js

		];

		if($this->form>0)$data['form-content']=$data['form-content']."</div>";


		if(isset($this->js))$data["form-js"]=$this->js;

		if($backend){

			return view(self::$layoutB)->with('data',$data);
		}

		return view(self::$layoutF)->with('data',$data);
	}




}

?>