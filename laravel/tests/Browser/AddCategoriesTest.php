<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCategoriesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCategories()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('category', 'Очень длинное название для какой-то категории')
                ->press('Добавить')
                ->assertPathIs('//admin/categories/create') // с одним слэшом тест выдаёт ошибку
                ->assertSee('Количество символов в поле Название категории не может превышать 20')
                ->assertSee('Поле Псевдоним категории для url обязательно для заполнения');
        });
    }

    public function testCategories2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('category', 'Бизнес')
                ->type('name', 'business')
                ->press('Добавить')
                ->assertPathIs('/admin/categories')
                ->assertSee('Категория успешно создана');
        });
    }
}
