<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \DB::table('admins')->insert([
            'name' => 'Nguyễn Phúc Hưng',
            'email' => 'hungbbtbbt1@gmail.com',
            'password' => bcrypt('123'),

        ]);
        \DB::table('admins')->insert([
            'name' => 'Võ Văn Bi',
            'email' => 'vbii.ued@gmail.com',
            'password' => bcrypt('123'),

        ]);
    }
}
