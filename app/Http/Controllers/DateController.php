<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Article;

class DateController extends Controller
{
    public function index($date)
    {
    	$date = Carbon::parse($date)->toDateString();
    	$startDate = $date . ' 00:00:00';
    	$endDate = $date . ' 23:59:59';

        $articles = Article::with('tags', 'category')
        				->whereBetween('published_at', [$startDate, $endDate])
		                ->public()
		                ->latest('published_at')
		                ->paginate(setting_value('paginate_size'));

        return view('date.index', ['articles' => $articles]);
    }
}
