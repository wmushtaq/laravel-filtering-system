<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call(AuthorTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AvailabilityTableSeeder::class);
        $this->call(PriceRangeTableSeeder::class);
        $this->call(BookTableSeeder::class);

        $this->command->info("Database seeded.");

        // Re Guard model
        Eloquent::reguard();
    }
}
