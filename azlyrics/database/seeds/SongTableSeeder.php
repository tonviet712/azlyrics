<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Song::class, 50)->create() ;
    }
}
