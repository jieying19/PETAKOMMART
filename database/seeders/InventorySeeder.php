<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example data for (products) inventory
        $inventorys = [
           
            ['productcode' => 'P001', 'product_name' => 'Biscuit Oreo', 'product_category' => 'food','quantity'=>'13', 'price'=>'15.00', 'created_at'=> '2024-05-16 01:02:38', 'updated_at'=>'2024-06-12 14:33:43', 'amount'=>'195','stock'=>'Low'],
            ['productcode' => 'P002', 'product_name' => 'Air Mineral 500ml Bottle', 'product_category' => 'beverage','quantity'=>'120', 'price'=>'15.00', 'created_at'=> '2024-05-16 01:03:27', 'updated_at'=>'2024-06-12 14:33:51', 'amount'=>'1800','stock'=>'High'],
            ['productcode' => 'P003', 'product_name' => 'Sandwich telur', 'product_category' => 'food','quantity'=>'120', 'price'=>'15.00', 'created_at'=> '2024-05-16 01:05:37', 'updated_at'=>'2024-06-12 14:33:58', 'amount'=>'1800','stock'=>'High'],

          
            // Add more products as needed
        ];

        // Insert data into the (products) inventory table
        foreach ($inventorys as $inventory) {
            Inventory::create($inventory);
        }
    }
}
