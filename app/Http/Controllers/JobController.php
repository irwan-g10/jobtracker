<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobPosition;
use App\Models\JobResource;
use App\Models\JobStatus;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');

        $jobs = Job::with(['jobPosition', 'jobStatus', 'jobResource'])
        ->when(
            $title,
            fn ($query, $title) => $query->title($title)
        )
        ->get();

        $jobStatuses = JobStatus::all();

        $usedStatusIds = Job::pluck('job_status_id'); // Ambil semua ID status yang sudah digunakan
        $jobStatuses = JobStatus::whereNotIn('id', $usedStatusIds)->get();

        return view('jobs.index', ['jobs' => $jobs, 'jobStatuses' => $jobStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $jobPositions = JobPosition::all();
        $jobStatuses = JobStatus::all();
        $jobResources = JobResource::all();

        return view('jobs.create',  [
        'jobPositions' => $jobPositions,
        'jobStatuses' => $jobStatuses,
        'jobResources' => $jobResources,
    ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'note' => 'nullable|string',
            'job_position_title' => 'required|string|max:255',
            // 'job_position_id' => 'required|exists:job_positions,id',
            'job_resource_id' => 'required|exists:job_resources,id',
        ]);


        $jobPosition = JobPosition::firstOrCreate(
            ['position_title' => $data['job_position_title']],
            ['position_title' => $data['job_position_title']]
        );
        $data['job_status_id'] = 1;
        $data['job_position_id'] = $jobPosition->id;

        Job::create($data);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::with(['jobPosition', 'jobStatus', 'jobResource'])->findOrFail($id);
        return view('jobs.show', ['job' => $job]);
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
