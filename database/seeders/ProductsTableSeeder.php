<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Minggu 1',
                'flag_active' => 1,
                'created_at' => '2022-04-11 18:28:08',
                'updated_at' => '2022-07-11 05:05:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mng 2',
                'flag_active' => 1,
                'created_at' => '2022-04-12 18:28:17',
                'updated_at' => '2022-07-11 06:17:19',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Minggu 3',
                'flag_active' => 1,
                'created_at' => '2022-04-12 18:28:23',
                'updated_at' => '2022-04-12 18:28:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Minggu 4',
                'flag_active' => 1,
                'created_at' => '2022-04-12 18:28:29',
                'updated_at' => '2022-07-11 06:17:26',
            ),
        ));
        
        
    }
}