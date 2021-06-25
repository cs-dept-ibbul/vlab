<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uuids = json_decode(json_encode(config('calculations.default_uuids')));       	
        $id = $uuids->faculty_id;
        DB::table('faculties')->insert([
            'id' => $id,           
            'school_id'=> $uuids->school_id,            
            'name'=>'Natural Science',
            'code'=>'FNS',            
            'picture'=>'',            
            'description'=>'Faculty description... will soon be updated by admin',            
            'status'=>'Active'
        ]);    
    }
}
