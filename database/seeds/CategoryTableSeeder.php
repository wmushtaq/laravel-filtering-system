<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // How many categories you need, defaulting to 10
        $count = (int)$this->command->ask('How many categories do you need ?', 10);

        $this->command->info("Creating {$count} categories.");

        // Create categories
        $genres = factory(App\Category::class, $count)->create();

        $this->command->info('Categories Created!');
    }
}
