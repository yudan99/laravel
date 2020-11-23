<?php

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
        Model::unguard();

        $this->call(UsersTableSeeder::class);
		$this->call(FielsTableSeeder::class);
        $this->call(FileSharesTableSeeder::class);
        $this->call(Fiels2filesTableSeeder::class);
        $this->call(Fiels2usersTableSeeder::class);
        //$this->call(AdminTablesSeeder::class);

        Model::reguard();
    }
}
