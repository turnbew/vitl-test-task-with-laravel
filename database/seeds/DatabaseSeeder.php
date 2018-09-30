<?php

	use Illuminate\Database\Seeder;
	use Illuminate\Database\Eloquent\Model;

	class DatabaseSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//10 test record into t_schools table
			for ($i=1; $i <= 10; $i++) { 
				DB::table('t_schools')->insert([
					'id' => NULL,
					'name' => 'School' . $i . ' ' . str_random(10),
					'postcode' => str_random(6)
				]);
			}
			
			//300 test record into t_members table
			for ($i=1; $i <= 300; $i++) { 
				DB::table('t_members')->insert([
					'id' => NULL,
					'name' => str_random(8) . " " . str_random(8),
					'email' => str_random(8) . "@toucantech.com",
					'schools_id' => rand(1, 10)
				]);
			}
		}
	}