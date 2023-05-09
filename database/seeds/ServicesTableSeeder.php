<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
        	'name'			=>'Outlook & SSPR',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'SharePoint',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'Teams',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'Ms Form',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'PowerApps/PowerAutomate',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'IT SR/DISHES',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'PowerBI',
        	'Desc'	        	=>'',
        ]);


        Service::create([
        	'name'			=>'Basic PowerPoint',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'Basic Excel',
        	'Desc'	        	=>'',
        ]);

    
        Service::create([
        	'name'			=>'SSPR',
        	'Desc'	        	=>'',
        ]);

}
}
