<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Dont forget this line

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['code' => 'A001', 'name' => 'เบาะจักรยาน PROXIM NEMBO TIROX', 'price' => 5800, 'stock_qty' => 3, 'category_id' => 4],
            ['code' => 'A002', 'name' => 'MEROCA ชุดล้อเสือหมอบคาร์บอน', 'price' => 6300, 'stock_qty' => 2, 'category_id' => 2],
            ['code' => 'A003', 'name' => 'เฟรมจักรยานเสือหมอบ De rosa SUPER KING E', 'price' => 21300, 'stock_qty' => 4, 'category_id' => 1],
            ['code' => 'A004', 'name' => 'เฟืองจักรยานเสือหมอบ 11', 'price' => 5300, 'stock_qty' => 9, 'category_id' => 6],
            ['code' => 'A005', 'name' => 'แฮนด์จักรยาน MAN.INTEGR.', 'price' => 27300, 'stock_qty' => 2, 'category_id' => 5],
            ['code' => 'A005', 'name' => 'ชุดขับจักรยานเสือภูเขา SRAM X0 T-TYPE EAGLE', 'price' => 64300, 'stock_qty' => 2, 'category_id' => 7],
        ]);
    }
}
