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
        
        DB::table('products')->insert([
            'name' => 'Playstation 4',
            'description' => 'description goes here',
            'category_id' => 1,
            'barcode' => '123456789',
            'image' => 'ps4.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Xbox One',
            'description' => 'description goes here', 
            'category_id' => 1,
            'barcode' => '32893482',
            'image' => 'xbox-one.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Apple Macbook Pro',
            'description' => 'description goes here', 
            'category_id' => 1,
            'barcode' => '323849202',
            'image' => 'macbook-pro.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Apple iPad Retina',
            'description' => 'description goes here',
            'category_id' => 2,
            'barcode' => '8329332',
            'image' => 'ipad-retina.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Acoustic Guitar',
            'description' => 'description goes here',
            'category_id' => 2, 
            'barcode' => '238949384',
            'image' => 'acoustic.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Electric Guitar',
            'description' => 'description goes here',
            'category_id' => 2,
            'barcode' => '023981723',
            'image' => 'electric.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Headphones',
            'description' => 'description goes here',
            'category_id' => 2,
            'barcode' => '023981711',
            'image' => 'headphones.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Speakers',
            'description' => 'description goes here',
            'category_id' => 2,
            'barcode' => '2398172l2',
            'image' => 'speakers.jpg',
        ]);
    }
}