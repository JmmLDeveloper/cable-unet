<?php

namespace Database\Seeders;

use Database\Seeders\ChannelSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{



    public function run()
    {
        $this->call([
            ChannelSeeder::class,
        ]);
    }
}
