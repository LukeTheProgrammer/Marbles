<?php

use Carbon\Carbon;
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
        $now = Carbon::now()->toDateTimeString();

        DB::table('users')->insert([
            'name' => 'Luke',
            'email' => 'lukehenry4@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('children')->insert([
            [
                'name' => 'Andreja',
                'marbles' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Eli',
                'marbles' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
