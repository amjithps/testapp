<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        \App\Models\User::factory(100)->create();

        // for ($i=0; $i < 100; $i++) { 

        //     DB::table('users')->insert([
        //         'name'       => Str::random(8),
        //         'description'      => Str::random(12).'@mail.com',
        //         'code'  => Str::random(8),
        //         'status'  => '1',
        //         'created_at' => '2021-05-24 12:03:03',
        //         'updated_at' => '2021-05-24 12:03:03',
        //     ]);
    	// }
    }
}
