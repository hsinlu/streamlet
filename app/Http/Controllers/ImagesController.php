<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
	public function index($filename)
	{
		return response()->download(storage_path('images/' . $filename));
	}

    public function upload(Request $request)
    {

    }

    public function ck_upload(Request $request)
    {
    	if ($request->hasfile('upload')) {
    		$file = $request->file('upload');
    		list($filename, $originalName) = $this->save($file);

    		return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' 
    				. $request->input('CKEditorFuncNum') . ', "' 
    				. url('images/' . $filename) . '","","'
    				. $originalName .'");</script>';
    	}
    }

    protected function save($file)
    {
    	if (!$file->isValid()) {
    		throw new Exception('图片不合法！');
    	}

		$filename = uniqid() . time() . $file->getClientOriginalExtension();
		$file->move(storage_path('images'), $filename);

		return [$filename, $file->getClientOriginalName()];
    }
}
