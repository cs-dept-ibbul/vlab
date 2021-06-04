<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uuids = json_decode(json_encode(config('calculations.default_uuids')));
     	
        $id = $uuids->school_id;
        DB::table('schools')->insert([
            'id' => $id,                       
            'name'=>'Virtual Laboratory Institute of Nigeria',
            'code'=>'Vlab',            
            'status'=>'Active'
        ]);   
    }
}
