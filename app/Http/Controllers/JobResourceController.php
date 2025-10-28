<?php

namespace App\Http\Controllers;

use App\Models\JobResource;
use Illuminate\Http\Request;

class JobResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobResource = JobResource::all();

        return view('job_resources.index', ['jobResource' => $jobResource]);
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
        $jobResource = $request->validate([
            'resource_name' => 'required|string|max:255',
        ]);

        JobResource::create($jobResource);
        return redirect()->route('job-resources.index')->with('success', 'Job resource created successfully.');
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
