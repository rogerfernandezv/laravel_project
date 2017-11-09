<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realestate;
use App\RealestateType;
use App\RealestateBusiness;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestates = Realestate::all();
        return view('realestate.index', compact('realestates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RealestateType::all();
        $business = RealestateBusiness::all();
        
        return view('realestate.create', compact('types', 'business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $realestate = new Realestate($request->all());

        return $realestate;
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
        $types = RealestateType::all();
        $business = RealestateBusiness::all();

        $realestate = Realestate::findOrfail($id);

        return view('realestate.create', compact('types', 'business', 'realestate'));
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
        $realestate = Realestate::findOrfail($id);
        $realestate->delete();

        return view('realestate.index');
    }
}
