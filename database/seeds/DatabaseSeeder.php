<?php

use Illuminate\Database\Seeder;
use App\Models\Model;

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
		//$this->call(CouponCodesTableSeeder::class);

		$this->call(FielsTableSeeder::class);
        $this->call(FileSharesTableSeeder::class);

        $this->call(Fiels2filesTableSeeder::class);
        $this->call(Fiels2usersTableSeeder::class);

        $this->call(CoursesTableSeeder::class);
        $this->call(EditionsTableSeeder::class);
        $this->call(ChaptersTableSeeder::class);
        $this->call(SectionsTableSeeder::class);

        //$this->call(OrderItemsTableSeeder::class);
        //$this->call(OrdersTableSeeder::class);

        $this->call(AdminTablesSeeder::class);

        Model::reguard();
    }
}
