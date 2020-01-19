<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();
        $userQuantity = 200;
        $catrgoriesQuantity=30;
        $productQuantity=1000;
        $transactionQuantity = 1000;
        factory(User::class,$userQuantity)->create();
        factory(Category::class,$catrgoriesQuantity)->create();
        factory(Product::class,$productQuantity)->create()->each(
            function($product){
                $categories = Category::all()->random(random_int(1,5))->pluck('id');
                $product->categories()->attach($categories);
            }
        );
        factory(Transaction::class,$transactionQuantity)->create();

        DB::statement("SET FOREIGN_KEY_CHECKS=1");

    }
}
