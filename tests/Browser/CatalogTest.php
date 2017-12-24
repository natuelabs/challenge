<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CatalogTest extends DuskTestCase
{
    /**
     * @test
     * Verify access Catalog page.
     * Verify product list, filter and order.
     *
     * @return void
     */
    public function VerifyProductListAndFilter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/catalog')
                    ->assertSee('Produtos')                    
                    ->assertSee('Sopa de morango')
                    ->pause(2000)
                    
                    ->check('#low-carb')
                    ->pause(2000)
                    ->click('#bt-filter')
                    ->assertSee('Sopa de castanha do pará')
                    ->pause(2000)                    
                    ->uncheck('#low-carb')
                    ->pause(2000)
                    
                    ->check('#gluten-free')
                    ->pause(2000)
                    ->click('#bt-filter')
                    ->assertSee('Cápsulas de limão')
                    ->pause(2000)                    
                    ->uncheck('#gluten-free')
                    ->pause(2000)
                    
                    ->check('#vegetarian')
                    ->pause(2000)
                    ->click('#bt-filter')
                    ->assertSee('Cápsulas de milho')
                    ->pause(2000)
                    ->uncheck('#vegetarian')
                    ->pause(2000)
                    ->click('#bt-filter')

                    ->click('#orderBy')
                    ->pause(4000)
                    ->click('#orderBy')
                    ->pause(2000);
        });
    }    
}
