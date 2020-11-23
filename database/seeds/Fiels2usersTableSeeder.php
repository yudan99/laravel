<?php

use Illuminate\Database\Seeder;
use App\Models\User;
//use App\Models\Fiel;
use App\Handlers\UniqueRandHandler;

class Fiels2usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();

        foreach ($users as $user){
            $rand_ids = UniqueRandHandler::unique_rand();
            $user->addFiel($rand_ids);
        }
    }

}
