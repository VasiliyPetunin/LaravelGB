<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SomeTest2 extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->press('Добавить новость')
                ->assertSee('Поле "Заголовок новости" обязательно для заполнения.')
                ->assertSee('Поле "Текст новости" не может быть пустым.');
        });
    }
}
