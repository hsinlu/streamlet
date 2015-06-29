<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetupRequest;
use App\Setting;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    public function setup() 
    {
    	return view('setup.setup');
    }

    public function store(SetupRequest $request)
    {
    	DB::delete('delete from settings');
    	DB::table('settings')->insert([
			['name' => 'name', 'value' => e($request->input('name'))],
			['name' => 'bio', 'value' => e($request->input('bio'))],
			['name' => 'title', 'value' => e($request->input('title'))],
			['name' => 'subtitle', 'value' => e($request->input('subtitle'))],
			['name' => 'keywords', 'value' => e($request->input('keywords'))],
			['name' => 'description', 'value' => e($request->input('description'))],
    	]);

    	event(new \App\Events\DoneSetupEvent);
    	return redirect('/');
    }
}
