<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $faker = \Faker\Factory::create();

        for ($i=1; $i < 11; $i++)
        {
        for ($n=0; $n < 3; $n++) {
        DB::table('authors')->insert([
        'created_at'  => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at'  => Carbon\Carbon::now()->toDateTimeString(),
        'first_name'  => $faker->firstName,
        'last_name'   => $faker->lastName,
        'organization' => $faker->company,
        'email'       => $faker->safeEmail,
        'type'        => 'S',
	      'research_id' => p4\Research::find($i)->id
         ]);
        }
      }
    }
}
