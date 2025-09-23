<?php

namespace App\Http\Controllers;

use App\Models\OfferedJob;
use Illuminate\Http\Request;

class OfferedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = OfferedJob::query();

        $jobs->when(request('search'), function ($query) {
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%')
                  ->orWhere('location', 'like', '%' . request('search') . '%');
        });

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
        return view('job.show', ['job' => $offered_job]);
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
