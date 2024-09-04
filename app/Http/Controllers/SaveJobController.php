<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class SaveJobController extends Controller
{


    public function index(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch saved jobs associated with the user
        $savedJobs = $user->savedJobs()->get();

        // Pass $savedJobs variable to the view
        return view('savedjobs', ['savedJobs' => $savedJobs]);
    }



    public function save(Request $request, $id, $companyName)
    {

        Session::flash('jobsave', 'The selected job has been saved.');

        $jobId = $id;
        $compName = $companyName;
        $userid = auth()->id(); // Get the authenticated user's ID

        // Retrieve the job information from the database
        $job = JobInfo::where('id', $jobId)->first();

        // Check if the job exists
        if ($job) {
            // Create a new entry in your database to save the job
            $savedJob = new SavedJob(); // Assuming SavedJob is your model for saved jobs table
            $savedJob->user_id = $userid;
            $savedJob->job_id = $jobId;
            $savedJob->company_name = $compName;
            $savedJob->title = $job->title; // Assuming 'title' is a column in JobInfo model
            $savedJob->location = $job->location; // Assuming 'location' is a column in JobInfo model

            // Save the saved job entry
            $savedJob->save();

            // Optionally, you can redirect to a success page or return a response
            return redirect()->back()->with('success', 'Job saved successfully!');
        } else {
            // Handle case where job with $jobId is not found
            abort(404, 'Job not found');
        }
    }
    public function destroy($id)
    {
        try {
            $savedJob = SavedJob::findOrFail($id);
            $savedJob->delete();
            session()->flash('jobdelete', 'Job ID: ' . $id . ' has been deleted');
            return redirect()->route('savedjobs')->with('success', 'Employment record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('savedjobs')->with('error', 'Failed to delete employment record.');
        }
    }


}
