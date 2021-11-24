<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SomeTest3 extends DuskTestCase
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
                ->type('title', '1')
                ->press('Изменить новость')
                ->assertSee('Поле "Заголовок новости" должно иметь более длинное название.');
        });
    }
}
