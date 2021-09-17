<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Workshop;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dayArray = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('workshops.create')->with('days', $dayArray);

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'time'=>'required',
            'day'=>'required']);

        $workshop = new Workshop;
        $workshop->name = $request->input('name');
        $workshop->time = $request->input('time');
        $workshop->day = $request->input('day');
        $workshop->save();
        return redirect('/admin')->with('success', 'Workshop created');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = Workshop::find($id);
        return view('workshops.create')->with($workshop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workshop = Workshop::find($id);
        return view('workshops.edit')->with($workshop);
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
        $this->validate($request, [
            'name'=>'required',
            'time'=>'required',
            'day'=>'required']);
        $workshop = Workshop::find($id);
        $workshop->name = $request->input('name');
        $workshop->time = $request->input('time');
        $workshop->day = $request->input('day');
        $workshop->save();
        return redirect('/admin')->with('success', 'Workshop created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshop = Workshop::find($id);
        $workshop->delete();
        return redirect('/admin')->with('success', 'Workshop deleted');
    }
}
