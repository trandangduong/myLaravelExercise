<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Seeder;

class UsersTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory()->create();
    }
}
