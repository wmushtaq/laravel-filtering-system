<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceRangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Creating price ranges.");

        DB::table('price_ranges')->insert([
            'min' => '5',
            'max' => '15',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('price_ranges')->insert([
            'min' => '16',
            'max' => '25',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('price_ranges')->insert([
            'min' => '26',
            'max' => '35',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('price_ranges')->insert([
            'min' => '36',
            'max' => '50',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $this->command->info('Price ranges Created!');
    }
}
