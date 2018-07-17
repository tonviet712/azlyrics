<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                SongTableSeeder::class,
                ArtistTableSeeder::class,
                AlbumTableSeeder::class ,
                Artist_SongTableSeeder::class
            ]) ;
    }
}
