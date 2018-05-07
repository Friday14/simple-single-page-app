<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Domain\Users\User::class)->create([
            'email' => 'admin@admin.com'
        ]);
    }
}
