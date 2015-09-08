<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function upload(Request $request)
    {

    }

    public function ck_upload(Request $request)
    {
    	if ($request->hasfile('upload')) {
    		$file = $request->file('upload');

            if (!$file->isValid()) {
                throw new Exception(trans('strings.image_not_invalid'));
            }

            $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/ck'), $filename);

    		return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' 
    				. $request->input('CKEditorFuncNum') . ', "' 
    				. url('images/ck/' . $filename) . '","","'
    				. $file->getClientOriginalName() .'");</script>';
    	}
    }
}
