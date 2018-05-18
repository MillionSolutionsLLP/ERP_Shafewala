<?php
namespace B\PM;

class Model extends \Illuminate\Database\Eloquent\Model
{

protected $table;
protected $connection;
protected $fillable;
protected $base_Field;


    public function __construct($id=false)
    {

        if($id){

            $this->table=Base::getTable($id);
            $this->connection=Base::getConnection($id);
            $this->base_Field=Base::getField($id);
            //dd($this->base_Field);
        }else
        {

            $this->table=Base::getTable();
            $this->connection=Base::getConnection();
            $this->base_Field=Base::getField();

        }
        
     
        foreach ($this->base_Field as $key => $value) {
            $this->fillable[]=$value['name'];
        }

        
        
    }


    
    public static function getProductCatagory($code){

        $model=new Model(1);
        $return= $model->where('UniqId',$code)->first();


        if($return != null  ){

            return (array)$return->toArray();
        }
        
        return (array)"Category Not Found";





    }



    public static function getProductbyId ($id){

        $model=new Model(0);
        if($model->where('UniqId',$id)->first() == null)return false;
        if($model->where('UniqId',$id)->first() != null)$model=$model->where('UniqId',$id)->first()->toArray();
        
        return $model;

    }


    public static function getProductCode(){
            
        // $model=new Model(0);

        // return $model->pluck('ProductName','UniqId')->toArray();        




        // $data=[];
        
        // return $data;


        $model=new Model(0);
        $data=$model->pluck('ProductTypeCode','UniqId')->toArray();
        
        $return=[];
        $data2=$model->pluck('ProductName','UniqId')->toArray();

        foreach ($data2 as $key => $value) {
           
                   $return[$key]=  $value.",".self::getProductCatagory($data[$key])['ProductTypeName'];
                }        
                return $return;
   





    }
    


    public function genuniqid(){
        return Base::genUniqID();
    }


    public function MS_all(){
        $row=$this->all();
        return $row;
    }

    public function MS_delete($data,$id){
        $row=new Model($id);
        //dd($row); 
        //dd($data);
        $row=$row->where('UniqId',$data['UniqId']);
        
        //if(\Storage::cloud()->exists($row->Attachments))\Storage::cloud()->delete($row->Attachments);
        //dd($row); 
        $row->delete();

        return ['status'=>'200','msg'=>"Data Succesfully removed from MSDB."];
    }


    public function MS_Check_Last($id,$current){

        $model=new Model($id);

        $formData=$model->get()->toArray();

        $last=count($formData)-1;
        $lastData=$formData[$last];

        $e=1;


         if(array_key_exists('_token', $current))unset($current['_token']);
          if(array_key_exists('UniqId', $current))unset($current['UniqId']);
       
        foreach ($current as $key => $value) {
            

        if(!($e && $lastData[$key]==$value))return true;

        }


        return false;

    }

    public function MS_update($data,$id){

        $row=new Model($id);
        $row=$row->where('UniqId',$data['UniqId']);
        //dd($data);
          if(array_key_exists('_token', $data))unset($data['_token']);
          if(array_key_exists('UniqId', $data))unset($data['UniqId']);
         $row->update($data);
      
   
        return ['status'=>'200','msg'=>"Data Succesfully added to MSDB."];

    }

    public function MS_add($data,$id=0){
            
            if($id)
                {$row=new Model($id);}else{
                    $row=new Model();
                }
          //  $data['AttachmentsArray']="array";
           // if(!(array_key_exists('Attachments', $data)))$data['Attachments']="array";
             if(array_key_exists('_token', $data))unset($data['_token']);
             if(array_key_exists('UniqId', $data))$data['UniqId']=Base::genUniqID();
        foreach ($data as $key => $value) {
            $row->$key=$value;
            
        }

        if($row->checkSave()['error']){
            return ['status'=>'200'];
        }
            return ['status'=>'200','msg'=>$row->checkSave()];
    }


    public function checkSave(){


         $error=\MS\Core\Helper\Comman::findDuplicate($this,'UniqId',$this->UniqId);
        // dd($error);
         if(!$error['error']){
            $this->save();
            $error=['error'=>false,'msg'=>"User Succesfully added to Database."];
            return $error;
         }
         return $error;
    }

}