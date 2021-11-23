<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData() {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];

        for ($i=0; $i<15; $i++) {

            $data[] = [
                'title' => $faker->sentence(5),
                'text' => $faker->text(300),
                'isPrivate' => false,
                'image' => null,
                'category_id' => $faker->numberBetween(1, 3)
            ];

        }

        return $data;
    }
}
