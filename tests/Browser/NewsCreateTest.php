<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->assertSee('Создать новость')
                    ->type('title', '')
                    ->press('@save-button')
                    ->assertSee('Поле Заголовок обязательно для заполнения.')
                    ->type('title','11')
                    ->press('@save-button')
                    ->assertSee('Количество символов в поле Заголовок должно быть не меньше 10')
                    ->type('content','')
                    ->press('@save-button')
                    ->assertSee('Поле Текст обязательно для заполнения.');
        });
    }
}
