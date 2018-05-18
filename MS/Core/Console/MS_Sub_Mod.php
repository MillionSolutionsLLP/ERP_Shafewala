<?php

namespace MS\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class MS_Sub_Mod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ms:sub:mod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Sub Module';
    protected $type;
    protected $name;
    public $INtype,$INname;
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
        
        $type = $this->choice('Type of Sub Module?', ['B', 'F']);

        $directory='MS/'. $type.'/M/';//.//$name;
        $module = $this->choice('Select Parent Module?', Storage::disk('MS-DOMS-MASTER-CORE')->directories($directory));
        $this->makeSubModule($module,$this->ask('Please Enter Name of Sub Module'));
       // dd($module);

        
        
        
        //$this->setType($this->argument('type') );

       
    }



    public function makeSubModule($module,$name){
    	$name= ucfirst($name);
        $module= ucfirst($module);

    	$directory=$module.'/'.$name;
    	$Masterdirectory='MS/Core/Templates/SubModuleCode';
        Storage::disk('MS-DOMS-MASTER-CORE')->copy($Masterdirectory.'/Base.php', $directory.'/Base.php');
        Storage::disk('MS-DOMS-MASTER-CORE')->copy($Masterdirectory.'/Controller.php', $directory.'/Controller.php');
        Storage::disk('MS-DOMS-MASTER-CORE')->copy($Masterdirectory.'/Model.php', $directory.'/Model.php');
        Storage::disk('MS-DOMS-MASTER-CORE')->copy($Masterdirectory.'/Routes.php', $directory.'/Routes.php');

    }

}
