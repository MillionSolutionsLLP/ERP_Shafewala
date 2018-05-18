<?php

namespace MS\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class MS_File_Clear extends Command
{
	 /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ms:clear ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Storage for Form Module';

    public $dArray;
/**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
      	



      	
		
		if($this->deleteUnwantedFolder()){
            $this->info("Storage Grabadge Cleared");
        }
		
		dd();

        
   

       
    }


    public function deleteUnwantedFolder(){
    	$path="public/master/Documents";
      	$files=Storage::disk("MS-DOMS-MASTER-CORE")->directories($path);

      	//$this->getUniqId($files);

      	$model=new \B\Form\Model ();
        //dd($files);
        $dbcan=$model->get()->pluck('UniqId');
        if($dbcan ==null){
            $dbcan=[];
        }else{
             $dbcan=$model->get()->pluck('UniqId')->toArray();
        }
        
        $fileFolder=[];
        foreach ($files as $key => $value) {
        $folder=explode("/", $value);
          $fileFolder[]=end( $folder);
        }
        $deleteFolder=array_diff($fileFolder, $dbcan);
     
        //dd($deleteFolder);
        foreach ($deleteFolder as $key => $value) {
            $this->info($value." deleted. ");
           Storage::disk("MS-DOMS-MASTER-CORE")->deleteDirectory(implode("/", [$path,$value]));
        }

        return true;



    }








}