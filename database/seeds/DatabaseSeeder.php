<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('realestate_business')->insert([
        	[
	            'name' => 'Locação',
        	],
        	[
	            'name' => 'Venda',
        	],
        	[
	            'name' => 'Temporada',
        	]
        ]);

        DB::table('realestate_types')->insert([
        	[
	            'name' => 'Apartamento',
        	],
        	[
	            'name' => 'Casa',
        	]
        ]);
    }
}
