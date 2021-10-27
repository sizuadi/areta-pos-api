<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('products')->delete();

        DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'majoo Pro',
                'description' => '<p><span style="text-align: justify;">Lorem Ipsum</span><span style="text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</span><br></p>',
                'price' => '2750000',
                'category_id' => 1,
                'created_at' => '2021-10-27 22:08:47',
                'updated_at' => '2021-10-27 22:08:47',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'majoo Advance',
                'description' => '<p><span style="text-align: justify;">Lorem Ipsum</span><span style="text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</span><br></p>',
                'price' => '4200000',
                'category_id' => 2,
                'created_at' => '2021-10-27 22:10:57',
                'updated_at' => '2021-10-27 22:10:57',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'majoo Lifestyle',
                'description' => '<p><span style="text-align: justify;">Lorem Ipsum</span><span style="text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</span><br></p>',
                'price' => '6700000',
                'category_id' => 2,
                'created_at' => '2021-10-27 22:12:26',
                'updated_at' => '2021-10-27 22:12:26',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'majoo Desktop',
                'description' => '<p><span style="text-align: justify;">Lorem Ipsum</span><span style="text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</span><br></p>',
                'price' => '8900000',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:13:32',
                'updated_at' => '2021-10-27 22:13:32',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Alice, surprised.',
                'description' => 'I fancied that kind of sob, \'I\'ve tried the effect of lying down on.',
                'price' => '1075679',
                'category_id' => 1,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'May it won\'t be.',
                'description' => 'Mouse, who was trembling down to nine inches high. CHAPTER VI. Pig.',
                'price' => '8043523',
                'category_id' => 2,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Alice went on.',
                'description' => 'I\'m not used to call him Tortoise, if he doesn\'t begin.\' But she did.',
                'price' => '3813341',
                'category_id' => 1,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'How she longed to.',
                'description' => 'And took them quite away!\' \'Consider your verdict,\' the King said.',
                'price' => '9192387',
                'category_id' => 2,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'I hadn\'t mentioned.',
                'description' => 'I\'m mad?\' said Alice. \'Of course they were\', said the Mouse in the.',
                'price' => '6273986',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'As there seemed to.',
                'description' => 'But do cats eat bats, I wonder?\' As she said to herself in the.',
                'price' => '4710732',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Tortoise because.',
                'description' => 'Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the.',
                'price' => '1468438',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'I beg your.',
                'description' => 'Lobster Quadrille?\' the Gryphon remarked: \'because they lessen from.',
                'price' => '4096491',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Hatter, \'when the.',
                'description' => 'ME,\' but nevertheless she uncorked it and put back into the book her.',
                'price' => '9244608',
                'category_id' => 1,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Rabbit\'s--\'Pat!.',
                'description' => 'MUST be more to come, so she helped herself to some tea and.',
                'price' => '8230861',
                'category_id' => 3,
                'created_at' => '2021-10-27 22:39:11',
                'updated_at' => '2021-10-27 22:39:11',
            ),
        ));


    }
}
