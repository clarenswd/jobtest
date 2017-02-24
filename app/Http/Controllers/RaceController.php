<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Race;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;






class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //sort in DB query to get the top 5
        $races = Race::where('closing_time','>', Carbon::now())->orderBy('closing_time', "ASC")->get()->slice(0,5);
        //Invert the sort - array level
        return view('welcome')->with('races', $races->sortBy('closing_time'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meetings = Meeting::all();
        $current_races= Race::all();

        return view('races.create_race')
            ->with(['meetings'=>$meetings, 'current_races'=>$current_races]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modObj= new Race();
        $modObj->closing_time    = $request->closing_time;
        $modObj->meeting_id    = $request->meeting;
        $modObj->save();

        // redirect

        Session::flash('message', 'Race was added to the system!');
        return Redirect::to('races');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $race = [];
        if (isset($id)){
            $race = Race::find($id);

        }
        return view('races.single')->with('race', $race);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //Dev - run RaceTableSeeder

    public function runSeeder(){
        $seed = new \RaceTableSeeder();
        $seed->run();
        Session::flash('message', 'RaceSeeder was run!');

        return redirect()->action('RaceController@index');

    }




}
