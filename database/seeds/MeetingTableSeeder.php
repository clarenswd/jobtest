<?php

use Illuminate\Database\Seeder;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
            'location' => 'Field 1',
            'type' => 'T',
        ]);

        DB::table('meetings')->insert([
            'location' => 'Field 2',
            'type' => 'G',
        ]);

        DB::table('meetings')->insert([
            'location' => 'Field 3',
            'type' => 'H',
        ]);

    }
}
