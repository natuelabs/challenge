<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CatalogTest extends DuskTestCase
{
    /**
     * @test
     * A access catalog page test.
     *
     * @return void
     */
    public function AccessCatalogPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/catalog')
                    ->assertSee('Produtos');
        });
    }

    /**
     * @test
     * Verify product list itens.
     *
     * @return void
     */
    public function VerifyProductListItens()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/catalog')
                    ->pause(5000)
                    ->assertSee('Barrinhas');
        });
    }

    /**
     * @test
     * Verify product list itens filter.
     *
     * @return void
     */
    public function VerifyProductListItensFilter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/catalog')
                    ->assertSee('Barrinhas')
                    ->pause(3000)
                    ->check('#vegetarian')
                    ->pause(3000)
                    ->click('#bt-filter')
                    ->assertSee('Cápsulas de milho')
                    ->pause(3000)
                    ->click('#orderBy')
                    ->pause(3000)
                    ->assertSee('Chips de milho')
                    ->pause(3000);
        });
    }    
}
