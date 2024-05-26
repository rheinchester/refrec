<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 
    
    
    /**
     * // Handle file upload
     *    [1] Get file name with extension
     *    [2] Get just file name
     *    [3] Get just extension
     *    [4] store file name as
     *    [5] upload image
     */        
    public static function upload_image(Request $request, $letter){   
        if ($request->hasFile($letter)) {
           $fileNameWithExt = $request->file($letter)->getClientOriginalName();                //1
           $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);                               //2
           $extension = $request->file($letter)->getClientOriginalExtension();                 //3
           $fileNameToStore = $fileName.'_'.time().'.'.$extension;                                  //4
           $path =  $request->file($letter)->storeAs('public/letters', $fileNameToStore); //5
       } else {
           $fileNameToStore = 'noimage.jpg';
       }
       return $fileNameToStore;
   }

  public static function convertToSlug($string) {
       return str_replace(' ', '-', strtolower($string));
   }
}
