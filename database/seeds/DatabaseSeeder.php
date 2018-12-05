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
        // $this->call(UsersTableSeeder::class);
		$this->call (UserTableSeeder::class);
		//下面两个不能乱写 否则会造成数据库没有自动 外键约束
		$this->call (CategoryTableSeeder::class);
		$this->call (ArticleTableSeeder::class);
		$this->call (RoleTableSeeder::class);

    }

}
