<?php

namespace App\Http\Controllers;
session_start();
use App\Models\Reference;
use App\Models\User;
use App\Models\SharedRefs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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
        // Consider generating random hash for reference before saving.
        $reference->save();
        return 'success';
        // return redirect('/admin')->with('success', 'Workshop created');
    }

    function getSelected(Request $request) {
        $selectedItems = $request->input('items', []);//This is a list of strings.
        $selectedReferences = array();
 
        foreach ($selectedItems as $item) { //Each item is a list of strings
            array_push($selectedReferences, Reference::find(intval($item)));
        }

        $_SESSION['selectedRefs'] = $selectedReferences;
        Session::save();
        return view('references.selectedReferences')->with('selectedReferences', $selectedReferences);
    }

    function generateSignedLink(Request $request){
        $sharedrefs = new SharedRefs;
        // return $request['items'];
  
        $retcheck = array();
        $selectedRefs =  $_SESSION['selectedRefs'];
        $ref_ids = array();
        // return $selectedRefs;
         // for each selected refs
        foreach ($selectedRefs as $ref) {
            // Check if selected refs id is in $request[items].
            if (in_array(strval($ref->id), $request['items'])) {
                array_push($retcheck, $ref);
                array_push($ref_ids, $ref->id);

                }
            }
            $str_ref_ids = implode('+', $ref_ids);
 
            // Save selected refs
            $sharedrefs->sharedRefList = $str_ref_ids;
            // save link
            $sharedrefs->sharedLink = URL::signedRoute('references.seeSelected', [
                'user_id' => Auth::user()->id, 
                'ref_ids' => $str_ref_ids
                ]);
            $sharedrefs->user_id = Auth::user()->id;
            $sharedrefs->save();
        // return gettype($sharedref->sharedRefsList);
        // return  $sharedrefs;
        return view('references.getLink')->with('sharedrefs', $sharedrefs);


    }

    function SeeSelected(Request $request, $user_id, $ref_ids){
        // return $ref_ids;
        // $refIdsArray = str_split('hello');
        $references = array();
        $ref_list = explode('+', $ref_ids);
        // return $ref_list;
        foreach ($ref_list as $id) {
            $reference = Reference::find($id);
            array_push($references, $reference);
        }
        $userName = User::find($user_id)->name;
        $data = [
            'userName' => $userName,
            'references'=> $references
        ];
        return view('references.seeSelected')->with($data);

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


                // Check if signed (middleware implemented)
        // Get ref ids from signed url
        // get references
        // view references
        // return URL::signedRoute('references.seeSelected');

// session_destroy();