<?php

use App\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publication::class, 10)->create();
        factory(Publication::class, 3)->create(['user_id' => 1]);
    }
}
