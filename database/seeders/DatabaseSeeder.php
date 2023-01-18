<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
         $users =\App\Models\User::factory(10)->create();
         $users->each(function ($user) { 
             \App\Models\Address::factory()->count(1)->create(['user_id'=>$user->id]); 
             \App\Models\Company::factory()->count(1)->create(['user_id'=>$user->id]); 
         });
        
         
          $users->random((int) $users->count() * 0.75)
            ->each(function ($user) use($faker, $users) {
                $users->except($user->id)
                    ->random($faker->numberBetween(1, (int) ($users->count() - 1) * 0.2))
                    ->each(function ($userToFollow) use ($user) {
                        $user->follow($userToFollow);
                    });
            }); 
    }
}
