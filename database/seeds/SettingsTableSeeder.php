<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
            0 => [
                'id'         => 1,
                'site_name'  => 'Ticket',
                'site_url'   => 'http://example.com',
                'email_to'   => 'admin@example.com',
                'email_from' => 'admin@example.com',
                'created_at' => '2017-11-17 13:42:19',
                'updated_at' => '2011-11-17 13:42:19',
            ],
        ]);
    }
}
