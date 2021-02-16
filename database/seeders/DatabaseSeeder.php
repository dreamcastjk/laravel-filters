<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
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
         User::factory(100)->create()->each(function (User $user) {
             UserInfo::factory()->create([
                 'user_id' => $user->id
             ]);
         });
    }
}
