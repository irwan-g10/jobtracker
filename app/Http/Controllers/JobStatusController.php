<?php

namespace App\Http\Controllers;

use App\Models\JobResource;
use App\Models\JobStatus;
use Illuminate\Http\Request;

class JobStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobStatus = JobStatus::all();

        return view('job_statuses.index', ['jobStatus' => $jobStatus]);
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
    public function store(Request $request, )
    {
        $data = $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        JobStatus::create($data);

        return redirect()->route('job-statuses.index')->with('success', 'Job status created successfully.');


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
