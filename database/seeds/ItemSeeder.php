<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item;
        $item->name = 'Lorem ipsum dolor sit amet';
        $item->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula viverra sem non viverra. Aliquam non tincidunt est.';
        $item->save();
    }
}
