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
        $this->call(UsersTableSeeder::class);
		$this->call(FielsTableSeeder::class);
        $this->call(FileSharesTableSeeder::class);
        //$this->call(AdminTablesSeeder::class);
    }
}
