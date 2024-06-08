<?php

namespace App\Traits;

use Illuminate\Http\Request;


trait UploadTrait{

    public function storeImage(Request $request,$inputName,$fillName){

        // Check img
        
        if (!$request->file($inputName)) {
    
            return redirect()->back()->withErrors(['Image Not Valid']);

        }else{
            
            $file = $request->file($inputName)->getClientOriginalName();
            $path = $request->file($inputName)->storeAs($fillName, $file,'upload_image');
    
        }
        return $path;
        

    }

}