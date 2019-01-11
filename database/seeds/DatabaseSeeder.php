<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//factory(App\User::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
        //DB::table('badgets')
        //    ->insert(['libelle' => 'php']);

        DB::table('niveaus')->insert(['niveau' => 'facile']);
        DB::table('niveaus')->insert(['niveau' => 'difficile']);
        DB::table('niveaus')->insert(['niveau' => 'moyenne']);
    }
}
