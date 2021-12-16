<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Str;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         for ($i = 1; $i < 20; $i++) {

         Client::create([
            'client_name' => Str::random(10),
            'client_email' => Str::random(10).'@gmail.com',
         ]);

        }

    }
}
