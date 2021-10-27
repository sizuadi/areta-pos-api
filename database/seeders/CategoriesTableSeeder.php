<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->delete();

        DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Standar',
                'created_at' => '2021-10-27 22:06:52',
                'updated_at' => '2021-10-27 22:06:52',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Middle',
                'created_at' => '2021-10-27 22:07:07',
                'updated_at' => '2021-10-27 22:07:07',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Advance',
                'created_at' => '2021-10-27 22:07:12',
                'updated_at' => '2021-10-27 22:07:12',
            ),
        ));


    }
}
