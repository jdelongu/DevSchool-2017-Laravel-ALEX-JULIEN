<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => str_random(10),
            'description' => str_random(100),
            'date_de_debut'=>date($format = 'Y-m-d', 10), // '1979-06-09'
            'date_de_fin'=>date($format = 'Y-m-d', 100), // '1979-06-09'
            'lieu'=>str_random(10),
            'tarif'=>rand(1,999),
            'organ_id' => rand(1,20)]);
    }
}
