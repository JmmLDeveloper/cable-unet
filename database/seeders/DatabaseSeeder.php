<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ChannelSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        $userA = new User;
        $userA->name = 'jose miguel';
        $userA->email = 'admin@gmail.com';
        $userA->password = '12345678';
        $userA->is_admin = 1;

        $userB = new User;
        $userB->name = 'pedro perez';
        $userB->email = 'sub@gmail.com';
        $userB->password = '12345678';
        $userB->is_admin = 0;

        $userA->save();
        $userB->save();


        $this->call([
            ChannelSeeder::class,
        ]);
    }
}
