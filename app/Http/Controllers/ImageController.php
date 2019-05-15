<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\FileUpload;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        
        request()->validate([
 
            'image' => 'required',
            'image.*' => 'mimes:jpeg,png,jpg,pdf|max:10000'
 
        ]);
 
        if ($image = $request->file('image')) {
            foreach ($image as $files) {
                $destinationPath = 'public/image/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
            }
        }
       
        $document = new FileUpload;
        $document->image = $profileImage;
        $document->process_id = $request->input('process_id');
        $document->save();
 
        return Redirect::back()->withSuccess('Documento Guardado Correctamente.');
 
    }
}
