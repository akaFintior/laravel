<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                "category" => "Спорт",
                "name" => "sport",
                "image" => asset('img/sport.jpg')
            ],
            [
                "category" => "Политика",
                "name" => "politics",
                "image" => asset('img/politics.jpg')
            ],
            [
                "category" => "Музыка",
                "name" => "music",
                "image" => asset('img/music.png')
            ],
        ];

        DB::table('categories')->insert($category);
    }
}
