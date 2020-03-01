<?php

use Illuminate\Database\Seeder;

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

    private function getData() {

        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(10, 20)),
                'inform' => $faker->realText(rand(100, 500)),
                'category_id' => $faker->numberBetween(1, 10),
                'is_private' => (boolean)rand(0, 1),
            ];
        }
        return $data;
    }
}
