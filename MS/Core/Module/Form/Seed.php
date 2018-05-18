<?php

namespace MS\Core\Module\Form;

use Illuminate\Database\Seeder;


class Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	


    	$this->seedForm(2500);
        
    }




    public function seedForm($number){


    	
    	$degree=['hsc','ssc',];
    	$doc=['hsc','ssc',];
    	
    	
    	for ($i=0; $i < $number ; $i++) { 
    	$faker = \Faker\Factory::create();
    	$jobexp=$faker->randomDigitNotNull;
    	$code=\B\Form\Base::genUniqID();

    	$oldPath="Ms/Core/TestDocument/";
    	$newPath="public/master/Documents/".$code."/";

    	\Storage::disk('MS-DOMS-MASTER-CORE')->copy($oldPath.'photo.jpg', $newPath.'photo.jpg');
    	\Storage::disk('MS-DOMS-MASTER-CORE')->copy($oldPath.'signature.jpg', $newPath.'signature.jpg');

    	for ($i2=1; $i2 <11 ; $i2++) { 
    		\Storage::disk('MS-DOMS-MASTER-CORE')->copy($oldPath.$i2.'.jpg', $newPath.$i2.'.jpg');
    	}
    		$data=[

					'UniqId'=>$code,
					'Post'=>"Urban Planner (SMMU)",
					'NamePrefix'=>$faker->titleMale,
					'NameFirst'=>$faker->firstNameMale,
					'NameFather'=>$faker->firstNameMale,
					'NameLast'=>$faker->lastName,
					'FatherPrefix'=>$faker->titleMale,
					'FatherFull'=>$faker->name,
					'PDDOB'=>$faker->dateTimeBetween($startDate = '-35 years', $endDate = '-18 years', $timezone = date_default_timezone_get()),
					'PDPNumber'=>$faker->phoneNumber,
					'PDMNumber'=>$faker->phoneNumber,
					'PDSex'=>'m',
					'PDMS'=>'false',
					'PDCaste'=>'st',
					'PDEmail'=>$faker->email,

					'PDAddress'=>$faker->streetAddress,
					'PDLandmark'=>$faker->word,
					'PDCity'=>$faker->city,
					'PDPincode'=>$faker->postcode,

					'Degree'=>implode(',', $degree),
					'DegreeData'=>',',
					'JobExp'=>$jobexp,
					'JobExpData'=>',',
					'Doc'=>implode(',', $doc),
					'DocPath'=>'public/master/Documents/'.$code,
					'Status'=>'1',


						];

						$model=new \B\Form\Model ();
						foreach ($data as $key => $value) {
							$model->$key=$value;
						}
						$model->save();	




    	}

    }

}
