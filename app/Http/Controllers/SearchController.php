<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	/**
	 * search
	 * 
	 * @param  string 
	 * @return view
	 */
    public function index($word)
    {
        return view('search.index');
    }
}
