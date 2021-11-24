<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SomeTest4 extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/update/6?_token=ZAFr4mOVqW5TzREStzeaa0xQljW9OEbp2ndbF9u4')
                ->type('text', '1')
                ->press('Изменить новость')
                ->assertSee('Поле "Текст новости" не может быть такого размера.');
        });
    }
}
