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
        $references = Reference::all();
        // return $reference;
        return view('references.index')->with('references', $references);
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
            return redirect()->route('login');
        }
        $reference = Reference::find($id);
        $referee = User::find($reference->user_id);
        $data = ['referee'=>$referee, 'reference'=>$reference]; #TODO if required we create a seperate page for tasker.
        // return $data;
        return view('references.show')->with($data);
    }


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
        $reference = Reference::find($id);
        $data = array(
            'reference' => $reference
        );
        // return $reference;
        return view('references.edit')->with($data);
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
        // return $request;
        $reference = Reference::find($id);
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
        // $reference->user_id = Auth::user()->id;
        
        $reference->save();
        return 'successfully editted';
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


// Commence service cycle rn
    // Create roles for individuals and institution-admin using auth guard.
        // Institution Home.
        // Institution Application
        // Institution generates application link to submit references to.
        // User goes to the link
        // User generates User selects references and sends them to an array. (Just like a shopping cart)
        // Once user is satisfied with the array, he can checkout or submit.
        // Once submitted, the user and associated references show up on the institution's application page like an order.
        // Instituion can then download the refernce letters for the user.