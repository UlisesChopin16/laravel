<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $applications = request()->user()->jobApplications()->with(['job', 'job.employer'])->latest()->get();
        // dd($applications);
        return view(
            'my_job_application.index',
            [
                // 'applications' => $applications,
                'applications' => request()->user()->jobApplications()
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                            // ->withTrashed(),
                        'job.employer'
                    ])
                    // ->with(['job', 'job.employer'])
                    ->latest()->get()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}
