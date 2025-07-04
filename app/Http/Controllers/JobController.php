<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with(['employer', 'tags'])->latest()->get()->groupBy('featured');
        
    
        return view('jobs.index', [
            'featuredJobs' => $jobs[1],
            'jobs' => $jobs[0],
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $attributes =  $request->validate([
        'title' => ['required'],
        'salary' => ['required'],
        'location' => ['required'],
        'schedule' => ['required', Rule::in(['part_time', 'full_time'])],
        'tags' => ['nullable'],
        'url' => ['required', 'active_url'],
       ]);

       $attributes['featured'] = $request->has('featured');
       $attributes['location'] = ucwords($attributes['location']);

       $job = Auth::user()->employer->jobs()->create( Arr::except($attributes, 'tags'));

       if($attributes['tags']){
        foreach(explode(',', $attributes['tags']) as $tag){
            $tag = ucwords(str_replace('-', ' ', $tag));
            $job->tag($tag);
        }

       }

       return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
