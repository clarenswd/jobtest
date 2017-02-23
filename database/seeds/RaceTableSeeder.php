<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //generate 10 races
        for($i=0;$i<10;$i++){
            $minutes =rand(1,$i);
            DB::table('races')->insert([
                'closing_time' => Carbon::now()->addMinutes($minutes)->format('H:i:s'),
                'is_closed' => false,
                'meeting_id'=>rand(1,3)
            ]);
        }

    }
}
