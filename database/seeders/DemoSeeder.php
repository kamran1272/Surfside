<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [];
        foreach (['Electronics', 'Fashion', 'Home & Living'] as $name) {
            $cats[] = Category::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($name)],
                ['name' => $name, 'image' => null]
            )->id;
        }

        $brands = [];
        foreach (['TechNova', 'UrbanStyle', 'HomeCraft'] as $name) {
            $brands[] = Brand::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($name)],
                ['name' => $name, 'image' => null]
            )->id;
        }

        $products = [
            ['name' => 'Wireless Headphones Pro', 'regular_price' => 149.99, 'sale_price' => 119.99, 'SKU' => 'TN-WH-001', 'stock_status' => 'instock', 'featured' => true, 'quantity' => 45, 'category_id' => $cats[0], 'brand_id' => $brands[0], 'short_description' => 'Premium noise-cancelling wireless headphones.'],
            ['name' => 'Smart Watch Series 5', 'regular_price' => 249.99, 'sale_price' => null, 'SKU' => 'TN-SW-005', 'stock_status' => 'instock', 'featured' => true, 'quantity' => 30, 'category_id' => $cats[0], 'brand_id' => $brands[0], 'short_description' => 'Fitness tracking smartwatch with AMOLED display.'],
            ['name' => 'Classic Denim Jacket', 'regular_price' => 89.99, 'sale_price' => 69.99, 'SKU' => 'US-DJ-012', 'stock_status' => 'instock', 'featured' => false, 'quantity' => 60, 'category_id' => $cats[1], 'brand_id' => $brands[1], 'short_description' => 'Timeless denim jacket in vintage wash.'],
            ['name' => 'Ceramic Vase Set', 'regular_price' => 54.99, 'sale_price' => null, 'SKU' => 'HC-CV-003', 'stock_status' => 'instock', 'featured' => false, 'quantity' => 25, 'category_id' => $cats[2], 'brand_id' => $brands[2], 'short_description' => 'Handcrafted ceramic vase set of 3.'],
            ['name' => 'Bluetooth Speaker Mini', 'regular_price' => 59.99, 'sale_price' => 44.99, 'SKU' => 'TN-BS-008', 'stock_status' => 'outofstock', 'featured' => false, 'quantity' => 0, 'category_id' => $cats[0], 'brand_id' => $brands[0], 'short_description' => 'Portable bluetooth speaker with deep bass.'],
        ];
        foreach ($products as $p) {
            $p['slug'] = \Illuminate\Support\Str::slug($p['name']);
            Product::firstOrCreate(['slug' => $p['slug']], $p);
        }

        $orders = [
            ['name' => 'Ahmed Khan', 'phone' => '+92 300 1234567', 'subtotal' => 119.99, 'tax' => 19.20, 'total' => 139.19, 'status' => 'delivered', 'items_count' => 1, 'delivered_on' => now()->subDays(2)],
            ['name' => 'Sara Ahmed', 'phone' => '+92 321 9876543', 'subtotal' => 189.98, 'tax' => 30.40, 'total' => 220.38, 'status' => 'pending', 'items_count' => 2],
            ['name' => 'Bilal Hussain', 'phone' => '+92 333 4567890', 'subtotal' => 69.99, 'tax' => 11.20, 'total' => 81.19, 'status' => 'processing', 'items_count' => 1],
        ];
        foreach ($orders as $o) {
            Order::firstOrCreate(['phone' => $o['phone'], 'total' => $o['total']], $o);
        }
    }
}
