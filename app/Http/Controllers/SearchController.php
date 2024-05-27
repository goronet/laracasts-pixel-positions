<?php

namespace App\Http\Controllers;

use App\Models\Job;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $jobs = Job::query()
            ->where('title', 'LIKE', '%' . request('q') . '%')
            ->width(['employer', 'tags'])
            ->get();

        return view('results', ['jobs' => $jobs]);
    }
}
