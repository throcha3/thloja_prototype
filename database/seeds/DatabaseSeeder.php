<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "root@root.com",
            'password' => bcrypt('toor'),
            'name' => 'Root'
        ]);

        DB::table('categories')->insert([
            'description' => "Categoria 1",
        ]);

        DB::table('subcategories')->insert([
            'description' => "SubCategoria 1",
            'category_id' => 1
        ]);
        DB::table('subcategories')->insert([
            'description' => "SubCategoria 2",
            'category_id' => 1
        ]);

        DB::table('payment_methods')->insert([
            'description' => "Forma de Pagto 1"
        ]);


        DB::table('customers')->insert([
            'first_name' => "Thiago 1",
            'last_name' => "Roucha",
        ]);

        DB::table('products')->insert([
            'description' => "Produto 1",
            'description_2' => "Descrição complementar 1",
            'supplier' => "Fornecedor 1",
            'photo_url' => "foto_1.jpg",
            'price' => 102.10,
            'cost_price' => 12.40,
            'current_amount' => 100,
            'subcategory_id' => 2
        ]);

        DB::table('products')->insert([
            'description' => "Produto 2",
            'description_2' => "Descrição complementar 2",
            'supplier' => "Fornecedor 2",
            'photo_url' => "foto_2.jpg",
            'price' => 9450.56,
            'cost_price' => 2222.33,
            'current_amount' => 100,
            'subcategory_id' => 1
        ]);

        DB::table('orders')->insert([
            'order_date' => "2020-01-01",
            'items' => 1,
            'total' => 100,
            'observations' => "observacao num sei que lá foto_1.jpg",
            'customer_id' => 1,
            'payment_id' => 1
        ]);

        DB::table('order_items')->insert([
            'total_price' => 200,
            'price' => 100,
            'amount' => 2,
            'order_id' => 1,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'total_price' => 4000,
            'price' => 1000,
            'amount' => 4,
            'order_id' => 1,
            'product_id' => 2
        ]);
    }
}

