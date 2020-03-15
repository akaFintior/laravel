<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            [
                'title' => 'Россия',
                'link' => 'https://lenta.ru/rss/articles/russia'
            ],
            [
                'title' => 'Мир',
                'link' => 'https://lenta.ru/rss/articles/world'
            ],
            [
                'title' => 'СССР',
                'link' => 'https://lenta.ru/rss/articles/ussr'
            ],
            [
                'title' => 'Экономика',
                'link' => 'https://lenta.ru/rss/articles/economics'
            ],
            [
                'title' => 'Силовые структуры',
                'link' => 'https://lenta.ru/rss/articles/forces'
            ],
            [
                'title' => 'Наука и техника',
                'link' => 'https://lenta.ru/rss/articles/science'
            ],
            [
                'title' => 'Культура',
                'link' => 'https://lenta.ru/rss/articles/culture'
            ],
            [
                'title' => 'Спорт',
                'link' => 'https://lenta.ru/rss/articles/sport'
            ],
            [
                'title' => 'Интернет и СМИ',
                'link' => 'https://lenta.ru/rss/articles/media'
            ]
        ]);
    }
}
