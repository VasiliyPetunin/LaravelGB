<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SomeTest extends DuskTestCase
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
                ->type('title', '1')
                ->type('text', 'qwer')
                ->press('Добавить новость')
                ->assertSee('Поле "Заголовок новости" должно иметь более длинное название.')
                ->assertSee('Поле "Текст новости" не может быть такого размера.');
        });
    }
}
