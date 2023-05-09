<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
        	'name'			=>'Jamaliah Binti Hasan',
        	'email'	        	=>'jamaliah@plus.com.my',
        	'phone'	        =>'03-76664056',	
        ]);

        Employee::create([
        	'name'			=>'Norhaslina Binti Hanafi',
        	'email'	        	=>'haslina@plus.com.my',
        	'phone'	        =>'03-76664055',	
        ]);

        Employee::create([
        	'name'			=>'Nur Baiduri Binti Zulkepli',
        	'email'	        	=>'nurbaiduri@plus.com.my',
        	'phone'	        =>'',	
        ]);

        Employee::create([
        	'name'			=>'Tengku Hanis Sofea Binti Tengku Nor Effendy Kamaruddin',
        	'email'	        	=>'hanis.kamaruddin@plus.com.my',
        	'phone'	        =>'03-76664055',	
        ]);

        Employee::create([
        	'name'			=>'Waydawati Binti Abu',
        	'email'	        	=>'wayda@plus.com.my',
        	'phone'	        =>'03-76664058',	
        ]);

        Employee::create([
        	'name'			=>'Khairul Amirin Bin Ismail',
        	'email'	        	=>'khairulamirin.ismail@plus.com.my',
        	'phone'	        =>'',	
        ]);

        Employee::create([
        	'name'			=>'Nur Amira Binti Muhammad Ghazali',
        	'email'	        	=>'amira.ghazali@plus.com.my',
        	'phone'	        =>'',	
        ]);

        Employee::create([
        	'name'			=>'Nadiah Najwa Binti Roslan',
        	'email'	        	=>'nadiah.roslan@plus.com.my',
        	'phone'	        =>'',	
        ]);

        Employee::create([
        	'name'			=>'Muhammad Izzul Bin Mohd Azhar',
        	'email'	        	=>'izzul.azhar@plus.com.my',
        	'phone'	        =>'',	
        ]);

        Employee::create([
        	'name'			=>'Muhamad Hilman Mohd Kasim',
        	'email'	        	=>'hilman.kasim@plus.com.my',
        	'phone'	        =>'',	
        ]);
    }
}
