<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    
    {
        $uuids = json_decode(json_encode(config('calculations.default_uuids')));
        $id = $uuids->department_id;
        DB::table('departments')->insert([
            'id' => $id,           
            'faculty_id'=> $uuids->faculty_id,            
            'name'=>'vlab-Admin',
            'code'=>'vlab-A',                        
            'status'=>'Active'
        ]);    
    }
}
