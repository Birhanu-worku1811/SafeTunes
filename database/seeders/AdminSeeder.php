<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Admin1',
                'email'=>'admin1@safetunes.com',
                'password'=>Hash::make('SafeTunesAdmin@2024'),
            ),
            array(
                'name'=>'Admin2',
                'email'=>'admin2@safetunes.com',
                'password'=>Hash::make('SafeTunesAdmin@2024'),
            ),
        );

        DB::table('admins')->insert($data);
    }
}
