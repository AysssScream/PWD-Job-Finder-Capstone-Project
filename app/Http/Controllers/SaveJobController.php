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
        $user = Auth::user();

        $savedJobs = $user->savedJobs()->get();

        return view('savedjobs', ['savedJobs' => $savedJobs]);
    }



    public function save(Request $request, $id, $companyName)
    {

        Session::flash('jobsave', 'The selected job has been saved.');

        $jobId = $id;
        $compName = $companyName;
        $userid = auth()->id();

        $job = JobInfo::where('id', $jobId)->first();

        if ($job) {
            $savedJob = new SavedJob();
            $savedJob->user_id = $userid;
            $savedJob->job_id = $jobId;
            $savedJob->company_name = $compName;
            $savedJob->title = $job->title;
            $savedJob->location = $job->location;

            $savedJob->save();

            return redirect()->back()->with('success', 'Job saved successfully!');
        } else {
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
