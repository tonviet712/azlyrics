<?php

use Illuminate\Database\Seeder;

class Artist_SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Artist_Song::class, 50)->create();
    }
}


