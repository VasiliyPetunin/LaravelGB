<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData() {
        $data = [];
        $categoriesTitles = ['Sport', 'Politics', 'Covid-19'];

        for ($i=0; $i<3; $i++) {

            $data[] = [
                'title' => $categoriesTitles[$i],
                'slug' => $categoriesTitles[$i]
            ];

        }

        return $data;
    }

}
