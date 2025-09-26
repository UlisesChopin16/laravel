<?php

namespace App\Http\Controllers;

use App\Models\OfferedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAnyEmployer', OfferedJob::class);
        return view(
            'my_job.index',
            [
                'jobs' => request()->user()->employer
                    ->offeredJobs()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                    // ->withTrashed()
                    ->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', OfferedJob::class);
        return view('my_job.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
