<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createStatus       = new Status();
        $createStatus->name = '打开';
        $createStatus->save();

        $createStatus       = new Status();
        $createStatus->name = '处理中';
        $createStatus->save();

        $createStatus       = new Status();
        $createStatus->name = '关闭';
        $createStatus->save();

        $createStatus       = new Status();
        $createStatus->name = '已回复';
        $createStatus->save();
    }
}
