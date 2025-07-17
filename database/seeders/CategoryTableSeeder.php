<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Dont forget this line

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(array(
            ['name'=>'เฟรม'],
            ['name'=>'ชุดล้อ'],
            ['name'=>'อุปกรณ์เสริม'],
            ['name'=>'เบาะนั่ง'],
            ['name'=>'แฮนด์'],
            ['name'=>'ชุดขับเคลื่อน'],
            ['name'=>'ระบบเบรก'],
            ['name' => 'จักรยาน']
        ));
    }
}
