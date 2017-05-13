<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Level;
use App\Game;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['name' => 'Dolce Fica', 'email' => 'dolcefica@gmail.com', 'password' => Hash::make('secret'), 'u_isAdmin' => 'false'],
            ['name' => 'Dolce Vica', 'email' => 'dolcevica@gmail.com', 'password' => Hash::make('secret'), 'u_isAdmin' => 'false'],
            ['name' => 'Martin Avramoski', 'email' => 'martin.avramoski@scotch.io', 'password' => Hash::make('secret'), 'u_isAdmin' => 'true'],
            ['name' => 'Dekica Eldridzovski', 'email' => 'dekica.eldridz@gmail.com', 'password' => Hash::make('secret'), 'u_isAdmin' => 'true'],
        );
        $levels = array(
            ['l_num' => 1, 'l_name' => 'FirstLevel', 'l_description'=>'NoDescription', 'g_id' => '1'],
            ['l_num' => 2, 'l_name' => 'SecondLevel', 'l_description'=>'NoDescription', 'g_id' => '1'],
            ['l_num' => 3, 'l_name' => 'ThirdLevel', 'l_description'=>'NoDescription', 'g_id' => '1'],
        );
        $games = array(
            ['g_description' => 'Simple maze game', 'g_name' => 'maze game', 'g_rules' => 'no special rules'],
        );
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
        foreach ($games as $game)
        {
            Game::create($game);
        }
        foreach ($levels as $level)
        {
            Level::create($level);
        }


        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
