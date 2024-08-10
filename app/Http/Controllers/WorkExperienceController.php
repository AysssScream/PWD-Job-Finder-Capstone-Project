<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\WorkExperience;
use App\Models\EmploymentInfo;

class WorkExperienceController extends Controller
{
    public function create()
    {
        // Get the authenticated user's work experiences
        $workExperiences = Auth::user()->workExperiences()->get();
        return view('profile.editemployment', compact('workExperiences'));
    }


    public function destroy($id)
    {
        try {
            $workExperiences = WorkExperience::findOrFail($id);
            $workExperiences->delete();

            return redirect()->route('profile.editemployment')->with('success', 'Employment record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('editemployment')->with('error', 'Failed to delete employment record.');
        }
    }






    public function store(Request $request)
    {
        // Decode the JSON-encoded input data
        $hiddenemployerName = json_decode($request->input('hiddenemployerName'));
        $hiddenemployerAddress = json_decode($request->input('hiddenemployerAddress'));
        $hiddenpositionHeld = json_decode($request->input('hiddenpositionHeld'));
        $hiddenfromDate = json_decode($request->input('hiddenfromDate'));
        $hiddentoDate = json_decode($request->input('hiddentoDate'));
        $hiddenlistskills = json_decode($request->input('hiddenlistskills'));
        $hiddenemploymentStatus = json_decode($request->input('hiddenemploymentStatus'));

        // Loop through the input data and save each entry
        foreach ($hiddenemployerName as $index => $employerName) {
            $workExperience = new WorkExperience();
            $workExperience->employer_name = $employerName[0]; // Accessing the first element of each nested array
            $workExperience->employer_address = $hiddenemployerAddress[$index][0];
            $workExperience->position_held = $hiddenpositionHeld[$index][0];
            $workExperience->from_date = $hiddenfromDate[$index][0];
            $workExperience->to_date = $hiddentoDate[$index][0];
            $workExperience->skills = $hiddenlistskills[$index][0];
            $workExperience->employment_status = $hiddenemploymentStatus[$index][0];
            $workExperience->user_id = Auth::id();
            $workExperience->save();
        }

        // Redirect to the profile edit page after saving
        return redirect()->route('editemployment');
    }

}
