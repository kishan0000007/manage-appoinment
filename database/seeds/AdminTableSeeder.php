<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
		'first_name' => 'Admin',
        'last name' => 'Admin',
        'picture' => 'Admin',
		'email' => 'admin@admin.com',
        'phone' => '0123456789',
		'password' => bcrypt('password'),
		]);
    }
}
