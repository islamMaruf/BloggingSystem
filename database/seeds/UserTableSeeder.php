<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=> 1,
            'email'=>'admin@blog.com',
            'password'=> bcrypt('root1'),
            'created_at'=> now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'role_id'=> 2,
            'email'=>'author@blog.com',
            'password'=> bcrypt('root1'),
            'created_at'=> now(),
            'updated_at'=>now()
        ]);




    }
}
