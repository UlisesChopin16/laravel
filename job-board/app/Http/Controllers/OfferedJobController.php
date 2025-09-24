<?php

namespace App\Http\Controllers;

use App\Models\OfferedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OfferedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', OfferedJob::class);

        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        $jobs = OfferedJob::with('employer')->filter($filters);

        return view('job.index', ['offered_jobs' => $jobs->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(OfferedJob $offered_job)
    {
        Gate::authorize('view', $offered_job);
        return view('job.show', ['job' => $offered_job->load('employer')]);
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
