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
            'start_time'			=>'2023-05-26 14:30:00',
        	'finish_time'	        	=>'2023-05-26 15:30:00',

        ]);


        Service::create([
        	'name'			=>'SharePoint',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-05-26 14:30:00',
        	'finish_time'	        	=>'2023-05-26 15:30:00',
        ]);


        Service::create([
        	'name'			=>'Teams',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-05-26 14:30:00',
        	'finish_time'	        	=>'2023-05-26 15:30:00',
        ]);


        Service::create([
        	'name'			=>'Ms Form',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-05-26 15:30:00',
        	'finish_time'	        	=>'2023-05-26 16:30:00',
        ]);


        Service::create([
        	'name'			=>'PowerApps/PowerAutomate',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-05-26 15:30:00',
        	'finish_time'	        	=>'2023-05-26 16:30:00',
        ]);

        Service::create([
        	'name'			=>'IT SR/DISHES',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-05-26 15:30:00',
        	'finish_time'	        	=>'2023-05-26 16:30:00',
        ]);

        Service::create([
        	'name'			=>'Power BI',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 14:30:00',
        	'finish_time'	        	=>'2023-06-02 15:30:00',
        ]);


        Service::create([
        	'name'			=>'Basic Sharepoint',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 14:30:00',
        	'finish_time'	        	=>'2023-06-02 15:30:00',
        ]);

        Service::create([
        	'name'			=>'Basic Sharepoint',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 14:30:00',
        	'finish_time'	        	=>'2023-06-02 15:30:00',
        ]);

        Service::create([
        	'name'			=>'Sharepoint',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 15:30:00',
        	'finish_time'	        	=>'2023-06-02 16:30:00',
        ]);

        Service::create([
        	'name'			=>'Teams',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 15:30:00',
        	'finish_time'	        	=>'2023-06-02 16:30:00',
        ]);

        Service::create([
        	'name'			=>'MS Form',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 15:30:00',
        	'finish_time'	        	=>'2023-06-02 16:30:00',
        ]);


}
}
