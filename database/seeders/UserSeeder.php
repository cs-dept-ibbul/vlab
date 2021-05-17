<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'admin@vlab.com';
        $uuids = config('calculations.default_uuids');
        $id = $uuids['user_id'];
        DB::table('users')->insert([
            'id' => $id,
            'first_name' => 'admin',
            'other_names' => 'admin',
            'email' => $email,
            'username' => $email,
            'session_id'=> $uuids['session_id'],
            'faculty_id'=> $uuids['faculty_id'],
            'school_id'=> $uuids['school_id'],
            'department_id'=> $uuids['department_id'],
            'role_id'=>$uuids['role_id'],                    
            'status'=>'Active',
            'user_ip_address'=>'-',
            'password' => md5('12345678'),
        ]);    
    }
}

// INSERT INTO `users` (`id`, `first_name`, `other_names`, `gender`, `role_id`, `email`, `matric_number`, `password`, `user_ip_address`, `token`, `status`, `date_added`, `date_modified`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES (null, 'Abdusalam', 'Abubakar Olajide', 'male', '', 'bynalabs@gmail.com', 'U16/FNS/MTH/1059', MD5('12345'), '', '', 'Active', '', '', NULL, NULL, NULL, NULL),(null, 'said', 'abdulsalam', 'male', '', 'saidabdulsalam5@gmail.com', 'U16/FNS/CSC/1052', MD5('12345'), '', '', 'Active', '', '', NULL, NULL, NULL, NULL);