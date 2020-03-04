<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', 'Свежайшая новость')
                ->type('inform', 'Вот и сама новость')
                ->select('category_id', '2')
                ->press('Добавить')
                ->assertPathIs('/news/all')
                ->assertSee('Новость успешно создана');
        });
    }

    public function testNews2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', 'новость')
                ->select('category_id', '55')
                ->press('Добавить')
                ->assertPathIs('//admin/addNews')  // с одним слэшом тест выдаёт ошибку
                ->assertSee('Количество символов в поле Заголовок новости должно быть не менее 10')
                ->assertSee('Выбранное значение для Категория новости некорректно')
                ->assertSee('Поле Текст новости обязательно для заполнения');
        });
    }
}
