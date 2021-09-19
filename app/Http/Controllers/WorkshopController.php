<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index')->with('workshops', $workshops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dayArray = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('workshops.create')->with('dayArray', $dayArray);

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        $this->validate($request, [
            'name'=>'required',
            'time'=>'required']
        );
        $workshop = new Workshop;
        $checkName= Workshop::where('name', '=', $request->input('name'))->first();
        if ($checkName !== null) {//It means theres duplicate
            
            // return redirect('/admin');
            return view('duplicate')->with('name', $request->input('name'));
        }
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
        return view('workshops.show')->with('workshop', $workshop);
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
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', "Saturday", 'Sunday'];
        $data = ['workshop' => $workshop, 'days' => $days, 'select_day' => $workshop->day];
        #TODO: why is timevalue not displaying on edit.blade.php
        return view('workshops.edit')->with($data);
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
        return redirect('/admin')->with('success', 'Workshop Editted');
    }


    public function search(Request $request)
    {
        $filter_query = $request->input('query');
        $this->validate($request, ['query'=>'required']);
        $message = '';
        $workshops  = Workshop::where('name', 'LIKE', '%'.$filter_query.'%')->get(); 
        if ((count($workshops)==0) || empty($filter_query)){
            $message = 'No result matches your query';
            $workshops = [];
        }
        $data = ['workshops'=>$workshops,'message'=> $message];
        return view('workshops.search_results')->with($data);
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
        return redirect('/home')->with('message', 'Workshop deleted');
    }
}
