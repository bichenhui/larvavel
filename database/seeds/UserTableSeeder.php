<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//数据库填充  编写Seeders
		//使用模型工厂
//		DB::table('users')->insert([
//									   'name' => str_random(10),
//									   'email' => str_random(10).'@gmail.com',
//									   'password' => bcrypt('secret'),
//								   ]);
		//调用模型工厂一次性填充多个数据  往数据表中
 		factory (\App\User::class,30)->create ();
 		//修改第一个数据为正式数据
		$user=\App\User::find(1);

		$user->name='毕臣辉';
		$user->email='1295727646@qq.com';
		$user->password = bcrypt('admin888');
		$user->is_admin = true;
		$user->save();

    }
}
