<?php

namespace MS\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class MS_DB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ms:db reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Fresh DB Files From Sample';
   
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
      
        
        $this->deleteDB();
        
       

       
    }	


    public function deleteDB(){


        $directory='MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master';

        $Masterdirectory='MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR.'Sample';

         $data=[

        [
            'to'=>'config',
            'from'=>'config'

        ],
        

           [
            'to'=>'CCM_Master',
            'from'=>'CCM_Master'

        ],
        


           [
            'to'=>'CCM_Data',
            'from'=>'CCM_Data'

        ],
        

        ];

        $dv=[];

$disk="MS-MASTER-CORE";
         foreach ( $data as $value) {
           Storage::disk($disk)->put($directory.DIRECTORY_SEPARATOR.$value['to'],$this->putDVin($dv,$Masterdirectory.DIRECTORY_SEPARATOR.$value['from']));
       }
    }

}
