<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uuids = json_decode(json_encode(config('calculations.default_roles')));                    
        DB::table('role')->insert([
            'id' => $uuids->admin,           
            'title'=> 'Admin',            
            'description'=>'System Administrator',            
            'status'=>'Active'
        ]);    
        DB::table('role')->insert([
            'id' => $uuids->instructor,           
            'title'=> 'Instructor',            
            'description'=>'Student Instructor',            
            'status'=>'Active'
        ]);    

        DB::table('role')->insert([
            'id' => $uuids->student,           
            'title'=> 'Student',            
            'description'=>'Student',            
            'status'=>'Active'
        ]);    
    }
}
