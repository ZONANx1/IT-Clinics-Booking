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
        	'name'			=>'Basic Excel',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 14:30:00',
        	'finish_time'	        	=>'2023-06-02 15:30:00',
        ]);

        Service::create([
        	'name'			=>'SharePoint',
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
        	'name'			=>'Ms Form ',
        	'Desc'	        	=>'',
            'start_time'			=>'2023-06-02 15:30:00',
        	'finish_time'	        	=>'2023-06-02 16:30:00',
        ]);


}
}
