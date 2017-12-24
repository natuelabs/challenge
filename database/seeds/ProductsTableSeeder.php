<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert(['name' => 'Sopa de castanha do pará','price' => 9.82]);
        \DB::table('products')->insert(['name' => 'Cápsulas de castanha do pará','price' => 27.37]);
        \DB::table('products')->insert(['name' => 'Chips de milho','price' => 32.24]);
        \DB::table('products')->insert(['name' => 'Cápsulas de morango','price' => 24.29]);
        \DB::table('products')->insert(['name' => 'Cápsulas de milho','price' => 9.16]);
        \DB::table('products')->insert(['name' => 'Sopa de milho','price' => 7.4]);
        \DB::table('products')->insert(['name' => 'Chips de morango','price' => 13.83]);
        \DB::table('products')->insert(['name' => 'Chips de castanha do pará','price' => 11.31]);
        \DB::table('products')->insert(['name' => 'Cápsulas de castanha do pará','price' => 32.59]);
        \DB::table('products')->insert(['name' => 'Barrinhas de mandioquinha','price' => 14.41]);
        \DB::table('products')->insert(['name' => 'Salgadinho de morango','price' => 16.12]);
        \DB::table('products')->insert(['name' => 'Cápsulas de milho','price' => 7.36]);
        \DB::table('products')->insert(['name' => 'Sopa de limão','price' => 20.79]);
        \DB::table('products')->insert(['name' => 'Cápsulas de limão','price' => 26.98]);
        \DB::table('products')->insert(['name' => 'Cápsulas de morango','price' => 25.63]);
        \DB::table('products')->insert(['name' => 'Salgadinho de milho','price' => 25.1]);
        \DB::table('products')->insert(['name' => 'Salgadinho de castanha do pará','price' => 27.52]);
        \DB::table('products')->insert(['name' => 'Salgadinho de limão','price' => 11.73]);
        \DB::table('products')->insert(['name' => 'Barrinhas de mandioquinha','price' => 5.9]);
        \DB::table('products')->insert(['name' => 'Sopa de morango','price' => 33.34]);
    }
}
