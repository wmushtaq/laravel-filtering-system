<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // How many books you need, defaulting to 100
        $count = (int)$this->command->ask('How many books do you need ?', 100);

        $this->command->info("Creating {$count} books.");

        // Create the Book
        $genres = factory(App\Book::class, $count)->create();

        $this->command->info('Books Created!');
    }
}
