<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {

        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->text(rand(10, 20)),
            ];
        }
        return $data;
    }
}
