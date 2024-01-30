<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        User::create([
            'name' => 'irchamzah',
            'email' => 'irchamzah@gmail.com',
            'password' => bcrypt('irchamzah')
        ]);

        User::create([
            'name' => 'suroto',
            'email' => 'suroto@gmail.com',
            'password' => bcrypt('suroto')
        ]);

        // User::create([
        //     'name' => 'shenila',
        //     'email' => 'shenila@gmail.com',
        //     'password' => bcrypt('shenila')
        // ]);

        // User::create([
        //     'name' => 'pras',
        //     'email' => 'pras@gmail.com',
        //     'password' => bcrypt('pras')
        // ]);

        // User::create([
        //     'name' => 'afdal',
        //     'email' => 'afdal@gmail.com',
        //     'password' => bcrypt('afdal')
        // ]);

        
    }
}
