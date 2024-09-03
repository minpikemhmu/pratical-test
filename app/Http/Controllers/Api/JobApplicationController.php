<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Response;
use App\Http\Requests\JobApplicationRequest;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(JobApplicationRequest $request)
    {
        // Store the uploaded resume file
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create the job application record
        $jobApplication = JobApplication::create([
            'job_id' => $request->input('job_id'),
            'user_id' => Auth::id(),
            'resume' => $resumePath,
            'cover_letter' => $request->input('cover_letter'),
            'status' => 'pending',
        ]);

        // Return a successful response
        return response()->json([
            'code' => 200,
            'message' => 'Job application submitted successfully.',
            'data' => $jobApplication,
        ], Response::HTTP_CREATED);
    }
}
