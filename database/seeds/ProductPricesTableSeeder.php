<?php

use Illuminate\Database\Seeder;

class ProductPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_prices')->insert([
            'product_id' => 1,
            'description' => 'single',
            'price' => 100.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 2,
            'description' => 'single', 
            'price' => 200.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 3,
            'description' => 'single', 
            'price' => 300.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 4,
            'description' => 'single',
            'price' => 400.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 5,
            'description' => 'single',
            'price' => 500.00
        ]);
        DB::table('product_prices')->insert([
            'product_id' => 6,
            'description' => 'single',
            'price' => 600.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 7,
            'description' => 'single',
            'price' => 700.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 8,
            'description' => 'single',
            'price' => 800.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 1,
            'description' => 'bundle (10 pcs)',
            'price' => 1000.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 2,
            'description' => 'bundle (10 pcs)', 
            'price' => 2000.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 3,
            'description' => 'bundle (10 pcs)', 
            'price' => 3000.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 4,
            'description' => 'bundle (10 pcs)',
            'price' => 4000.00 
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 5,
            'description' => 'bundle (10 pcs)',
            'price' => 5000.00
        ]);
        DB::table('product_prices')->insert([
            'product_id' => 6,
            'description' => 'bundle (10 pcs)',
            'price' => 6000.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 7,
            'description' => 'bundle (10 pcs)',
            'price' => 7000.00
        ]);

        DB::table('product_prices')->insert([
            'product_id' => 8,
            'description' => 'bundle (10 pcs)',
            'price' => 8000.00
        ]);
    }
}
