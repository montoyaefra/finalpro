<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemListname;
use App\Models\Listname;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories=["Fruits and vegetables", "Meat and fish", "Beverages"];

        foreach ($categories as $category){
        Category::create(["name"=> $category]);
        }

        // EJECUTA EL FACTORY QUE CREA LOS ITEMS
        Item::factory(15)->create();

        // EJECUTA EL FACTORY QUE CREA LOS NOMBRES DE LAS LISTAS
        Listname::factory(5)->create();

        // CREA LOS ITEMS RELACIONADOS A LAS LISTA
        ItemListname::factory(15)->create();
    }


}


