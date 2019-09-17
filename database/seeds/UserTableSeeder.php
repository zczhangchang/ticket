<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'fullname'       => 'Admin',
                'username'       => 'admin',
                'email'          => 'admin@example.com',
                'password'       => bcrypt('12345678'),
                'gender'         => 'M',
                'location'       => 'ChangDe',
                'website'        => 'http://example.com',
                'remember_token' => null,
                'created_at'     => '2017-11-17 13:42:19',
                'updated_at'     => '2017-11-17 13:42:19',
            ],
            1 => [
                'id'             => 2,
                'fullname'       => 'Doctor Zhu',
                'username'       => 'zhu',
                'email'          => 'zhu@example.com',
                'password'       => bcrypt('12345678'),
                'gender'         => 'F',
                'location'       => 'ChangDe',
                'website'        => 'http://example.com',
                'remember_token' => null,
                'created_at'     => '2017-11-17 13:42:19',
                'updated_at'     => '2017-11-17 13:42:19',
            ],
            2 => [
                'id'             => 3,
                'fullname'       => 'Nao Ban',
                'username'       => 'nao',
                'email'          => 'nao@example.com',
                'password'       => bcrypt('12345678'),
                'gender'         => 'M',
                'location'       => 'ChangDe',
                'website'        => 'http://example.com',
                'remember_token' => null,
                'created_at'     => '2017-11-17 13:42:19',
                'updated_at'     => '2017-11-17 13:42:19',
            ],
        ]);
    }
}
