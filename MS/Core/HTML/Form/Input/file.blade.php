
<div class="form-group col-lg-6">

<?php 

if(array_key_exists('index', $data))$index=$index+$data['index'];

	
//dd(url(\Storage::cloud()->url($data['value'])));
		
		if (array_key_exists('value', $data)) {
			//dd($data['value']);
			if($data['value']!=null){

				$data['value']=url(\Storage::cloud()->url($data['value']));
				echo "Uploaded File Path: ".$data['value'];
				$data['value']='';


			}
			

		}

			echo Form::label($data['name'], $data['lable']."*");
			echo Form::file($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,] );
		
?>

<small class="text-danger ">
*=new file uploaded old, file will be deleted after adminstration permision.
</small>
    
</div> 