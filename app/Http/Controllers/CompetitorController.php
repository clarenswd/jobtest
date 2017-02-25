<?php

namespace App\Http\Controllers;

use App\Competitor;
use App\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //sort in DB query to get the top 5
        $competitors = Competitor::all();

        //Invert the sort - array level
        return view('competitors.index')->with('competitors', $competitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $races= Race::all();
        $competitors = Competitor::all();


        return view('competitors.create_competitor')
            ->with(['competitors'=>$competitors, 'races'=>$races]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modObj= new Competitor();
        $modObj->race_id = $request->race;
        $modObj->name    = $request->name;
        $modObj->position= $request->position;
        $modObj->save();

        // redirect

        Session::flash('message', 'Competitor was added to the system!');
        return redirect()->action('CompetitorController@create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
