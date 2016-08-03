<?php

use Illuminate\Database\Seeder;

class BuildHdBox extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Building the default HD Box
        DB::table('shipping_boxes')->insert([
            'name' => 'HD Box',
            'price' => 26500,
            'length' => 18,
            'width' => 18,
            'height' => 22,
            'max_weight' => 24948,
        ]);
    }
}
