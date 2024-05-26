<?php

namespace App\Http\Controllers;
use App\Models\Reference;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reference = Reference::all();
        return $reference;
        // return view('references.index')->with('references', $reference);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('references.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference = new Reference;
        // $checkName= Workshop::where('name', '=', $request->input('name'))->first();
        $this->validate($request, [
            'letter'=>'nullable|max:1999']);
        $letter = 'letter';
        $reference->first_name = $request->input('first_name');
        $reference->last_name = $request->input('last_name');
        $reference->qualification = $request->input('qualification');
        $reference->phone = $request->input('phone');
        $reference->email = $request->input('email');
        $reference->organization = $request->input('organization');
        $reference->letter = Controller::upload_image($request, $letter); 
        $reference->user_id = Auth::user()->id;
        
        $reference->save();
        return 'success';
        // return redirect('/admin')->with('success', 'Workshop created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Gig::find($id);
        if (!Auth::check()){
            // #TODO Login is not returning to intended page after login. TODO.
            return redirect()->route('login');
        }
        $reference = Reference::find($id);
        $referee = User::find($reference->user_id);
        $data = ['referee'=>$referee, 'reference'=>$reference]; #TODO if required we create a seperate page for tasker.
        // return $data;
        return view('references.show')->with($data);
    }


    // public function getDownload($letter)// Might put in main controller later
    // {
    //     //PDF file is stored under project/public/storage/letters/filename
    //     $file= public_path(). "/storage"."/".$letter;

    //     $headers = array(
    //             'Content-Type: application/pdf',
    //             );

    //     return Response::download($file, 'filename.pdf', $headers);
    // }
    public function getDownload($id){
        // $path = Reference::where("id", $id)->value("file_path");
        $reference = Reference::find($id);

        $file= public_path(). "\\storage"."\\letters\\".$reference->letter;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'filename.pdf', $headers);
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


// Add institution
// Enctype
// download functionality