<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(Request $request)
    {

        $jobs = Job::with(['employer', 'tags'])->where('title', 'ILIKE', '%'.$request['q'].'%')->get();

        return view('results', [
            'jobs' =>$jobs
        ]);
    }

}
