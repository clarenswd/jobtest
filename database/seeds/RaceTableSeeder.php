<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RaceTableSeeder extends Seeder
{
    const LIMIT = 10;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $previous_minutes=mt_rand(1,self::LIMIT);
        //generate 10 races0
        for($i=0;$i<self::LIMIT;$i++){
            $minutes =mt_rand(1,self::LIMIT);

            if($minutes != $previous_minutes){
                DB::table('races')->insert([
                    'closing_time' => Carbon::now()->addMinutes(mt_rand(1,59))->format('H:i:s'),
                    'is_closed' => false,
                    'meeting_id'=>rand(1,3)
                ]);
                $previous_minutes = $minutes;
            }
        }

    }
}
