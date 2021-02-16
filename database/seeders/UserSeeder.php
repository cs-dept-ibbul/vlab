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
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::factory()
            ->count(10)
            // ->hasPosts(1)
            ->create();
    }
}

// INSERT INTO `users` (`id`, `first_name`, `other_names`, `gender`, `role_id`, `email`, `matric_number`, `password`, `user_ip_address`, `token`, `status`, `date_added`, `date_modified`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES ('', 'Abdusalam', 'Abubakar Olajide', 'male', '', 'bynalabs@gmail.com', 'U16/FNS/MTH/1059', MD5('12345'), '', '', 'Active', '', '', NULL, NULL, NULL, NULL);