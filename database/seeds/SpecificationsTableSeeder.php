<?php

use Illuminate\Database\Seeder;

class SpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('specifications')->insert(['description' => 'vegan']);
        \DB::table('specifications')->insert(['description' => 'vegetarian']);
        \DB::table('specifications')->insert(['description' => 'low-carb']);
        \DB::table('specifications')->insert(['description' => 'lactose-free']);
        \DB::table('specifications')->insert(['description' => 'gluten-free']);
    }
}
