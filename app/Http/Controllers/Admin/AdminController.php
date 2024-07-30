<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use App\Models\EducationalAttainment;
use App\Models\PwdInformation;
use App\Models\User;
use App\Models\Skill;
use App\Models\LanguageInput;
use App\Models\ApplicantProfile;
use App\Models\PersonalInfo;
use App\Models\EmploymentInfo;
use App\Models\JobApplication;
use App\Models\AuditTrail;
use App\Models\Employer;
use App\Models\Message;
use App\Models\Reply;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {

        // Perform the database queries to get user counts
        $userCount = \App\Models\User::where('usertype', 'user')->count();
        $employerCount = \App\Models\User::where('usertype', 'employer')->count();
        $jobInfoCount = \App\Models\JobInfo::count();
        $hiredjobCount = \App\Models\JobApplication::where('status', 'hired')->count();
        $pendingjobCount = \App\Models\JobApplication::where('status', 'pending')->count();
        $users = User::take(4)->get();
        $maxSkills = 3;
        $maxEducation = 3;
        $maxDisabilities = 3;
        $workExperiences = WorkExperience::all();
        $skills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills)); // Split skills by comma and trim whitespace
        })->filter() // Remove any empty values
            ->countBy() // Count occurrences of each skill
            ->sortDesc(); // Sort skills by count in descending order

        $topSkills = $skills->take($maxSkills); // Get the top $maxSkills
        $totalSkillsCount = $skills->sum(); // Get the total count of all skills
        $topSkillsCount = $topSkills->sum(); // Get the total count of top skills
        $othersCount = $totalSkillsCount - $topSkillsCount; // Calculate the count for "Others"

        // For least employable skills
        $leastEmployableSkills = $skills->sort()->take($maxSkills); // Get the bottom $maxSkills - 1 skills
        $leastEmployableSkillsCount = $leastEmployableSkills->sum(); // Get the total count of bottom skills
        $leastEmployableOthersCount = $totalSkillsCount - $leastEmployableSkillsCount; // Calculate the count for "Others"


        $leastEmployableSkills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills)); // Split skills by comma and trim whitespace
        })->filter() // Remove any empty values
            ->countBy() // Count occurrences of each skill
            ->sort() // Sort skills by count in ascending order
            ->take($maxSkills); // Limit the number of least employable skills


        // Fetch and process educational attainments
        $educationalAttainments = EducationalAttainment::all();
        $educationLevels = $educationalAttainments->pluck('educationLevel')->countBy(); // Count occurrences of each education level
        $mostEmployableEducationLevels = $educationLevels->sortDesc()->take($maxEducation); // Limit to top 5 most frequent education levels
        $leastEmployableEducationLevels = $educationLevels->sort()->take($maxEducation); // Limit to bottom 5 least frequent education levels
        $otherEducationLevels = $educationLevels->except($mostEmployableEducationLevels->keys())->sum();
        $otherleastEducationLevels = $educationLevels->except($leastEmployableEducationLevels->keys())->sum();
        $mostEmployableEducationLevels = $mostEmployableEducationLevels->put('Others', $otherEducationLevels);
        $leastEmployableEducationLevels = $leastEmployableEducationLevels->put('Others', $otherleastEducationLevels);



        // Fetch all data from PwdInformation
        $pwdInformationData = PwdInformation::all();

        // Process disability occurrences
        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy(); // Count occurrences of each disability
        $disabilityType = $pwdInformationData->pluck('disability')->countBy(); // Count occurrences of each disability

        return view('admin.dashboard', [
            'users' => $users,
            'userCount' => $userCount,
            'employerCount' => $employerCount,
            'jobInfoCount' => $jobInfoCount,
            'skills' => $topSkills, // Pass top skills to the view
            'othersCount' => $othersCount, // Pass others count to the view
            'totalSkillsCount' => $totalSkillsCount, // Pass total skills count to the view
            'leastEmployableSkills' => $leastEmployableSkills, // Pass least employable skills to the view
            'leastEmployableOthersCount' => $leastEmployableOthersCount, // Pass least employable "Others" count to the view
            'educationLevels' => $educationLevels,
            'mostEmployableEducationLevels' => $mostEmployableEducationLevels, // Pass most employable education levels to the view
            'leastEmployableEducationLevels' => $leastEmployableEducationLevels, // Pass least employable education levels to the view
            'disabilityOccurrences' => $disabilityOccurrences, // Pass disability occurrences to the view
            'disabilityType' => $disabilityType,
            'hiredjobCount' => $hiredjobCount,
            'pendingjobCount' => $pendingjobCount

        ]);
    }

    public function getReplies($id)
    {
        $replies = Reply::where('message_id', $id)->get();
        return response()->json(['replies' => $replies]);
    }

    public function messages()
    {
        $messages = Message::all();
        $replies = Reply::all();
        $users = User::all();

        return view('admin.messages', [
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
    }

    public function storeReply(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'replyMessage' => 'required|string|max:300',
            'message_id' => 'required|exists:messages,id', // Validate that the message_id exists in the messages table
        ]);

        // Find the message
        $message = Message::find($request->input('message_id'));
        if (!$message) {
            return redirect()->back()->withErrors('Message not found.');
        }

        // Create a new reply
        Reply::create([
            'message_id' => $message->id,
            'message' => $request->input('replyMessage'),
            'reply_to' => $message->from,
            'reply_from' => auth()->user()->email, // Get the email of the current user
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }


    public function storeMessage(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        // Create a new message record
        Message::create([
            'from' => auth()->user()->email, // Use the authenticated user's email
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function manageusers(Request $request)
    {
        // Extract filter values from request
        $status = $request->input('status');
        $role = $request->input('role');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Query to fetch users with optional filters
        $query = User::with('pwdInformation')
            ->whereIn('usertype', ['user', 'employer']);

        if ($status) {
            $query->where('account_verification_status', $status);
        }

        if ($role) {
            $query->where('usertype', $role);
        }

        if ($dateFrom && $dateTo) {
            $formattedDateFrom = Carbon::parse($dateFrom)->startOfDay();
            $formattedDateTo = Carbon::parse($dateTo)->endOfDay();
            $query->whereBetween('created_at', [$formattedDateFrom, $formattedDateTo]);
        }
        // Apply pagination
        $users = $query->paginate(10); // Adjust the number of items per page as needed

        // Count for statistics
        $approvedCount = User::where('account_verification_status', 'approved')->count();
        $declinedCount = User::where('account_verification_status', 'declined')->count();
        $waitingforapprovalCount = User::where('account_verification_status', 'waiting for approval')->count();
        $pendingCount = User::where('account_verification_status', 'pending')->count();

        return view('admin.manageusers', [
            'users' => $users,
            'approvedCount' => $approvedCount,
            'declinedCount' => $declinedCount,
            'waitingforapprovalCount' => $waitingforapprovalCount,
            'pendingCount' => $pendingCount,
        ]);
    }


    public function audit(Request $request)
    {
        // Extract filter values from request
        $action = $request->input('action');
        $section = $request->input('section');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Create query to fetch audit trails
        $query = AuditTrail::with('user');

        // Apply action filter
        if ($action) {
            $query->where('action', $action);
        }

        // Apply section filter
        if ($section) {
            $query->where('section', $section);
        }

        // Apply date filters
        if ($dateFrom && $dateTo) {
            $formattedDateFrom = Carbon::parse($dateFrom)->startOfDay();
            $formattedDateTo = Carbon::parse($dateTo)->endOfDay();
            $query->whereBetween('created_at', [$formattedDateFrom, $formattedDateTo]);
        }

        // Apply pagination
        $auditTrails = $query->paginate(10); // Adjust the number of items per page as needed

        return view('admin.audittrail', ['auditTrails' => $auditTrails]);
    }



    public function employerapplication($id)
    {
        // Find the Employer model by ID
        $employer = Employer::where('user_id', $id)->firstOrFail();

        // Fetch the associated User model through the relationship
        $user = $employer->user;

        // Return the view with the necessary data
        return view('admin.useremployerapplication', [
            'user' => $user,
            'employer' => $employer
        ]);
    }


    public function manage()
    {
        return view('admin.user');
    }

    public function userapplication($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();
        $jobapplication = JobApplication::where('user_id', $id)->first();

        // Pass data to the view
        return view('admin.userapplication', [
            'user' => $user,
            'applicant' => $applicant,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
            'pwdinfo' => $pwdinfo,
            'jobapplication' => $jobapplication,
        ]);
    }

    public function approveuser($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if ($user) {
            // Update the verification status
            $user->account_verification_status = 'waiting for approval'; // or 1, depending on your column type
            $user->save();

            return redirect()->back()->with('success', 'User verified successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }



    public function userpwdapplication($id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();

        return view('admin.userpwdapplication', [
            'applicant' => $applicant,
            'pwdinfo' => $pwdinfo,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
        ]);
    }



    public function details($type)
    {

        $maxSkills = 3;
        $workExperiences = WorkExperience::all();
        $skills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills)); // Split skills by comma and trim whitespace
        })->filter() // Remove any empty values
            ->countBy() // Count occurrences of each skill
            ->sortDesc(); // Sort skills by count in descending order

        $topSkills = $skills; // Get the top $maxSkills
        $totalSkillsCount = $skills->sum(); // Get the total count of all skills
        $topSkillsCount = $topSkills->sum(); // Get the total count of top skills
        $othersCount = $totalSkillsCount - $topSkillsCount; // Calculate the count for "Others


        // For least employable skills
        $leastEmployableSkills = $skills->sort(); // Get the bottom $maxSkills - 1 skills
        $leastEmployableSkillsCount = $leastEmployableSkills->sum(); // Get the total count of bottom skills

        // Fetch all educational attainments
        $educationalAttainments = EducationalAttainment::all();

        // Count occurrences of each education level
        $educationLevels = $educationalAttainments->pluck('educationLevel')->countBy();

        // Calculate the total number of records
        $totalEducationLevelsCount = $educationLevels->sum(); // Total count of all education levels

        // Get most employable education levels (most frequent)
        $mostEmployableEducationLevels = $educationLevels->sortDesc(); // Sorted in descending order

        // Get least employable education levels (least frequent)
        $leastEmployableEducationLevels = $educationLevels->sort(); // Sorted in ascending order




        return view('admin.details', [
            'skills' => $topSkills, // Pass top skills to the view
            'othersCount' => $othersCount, // Pass others count to the view
            'totalSkillsCount' => $totalSkillsCount, // Pass total skills count to the view
            'type' => $type,
            'leastEmployableSkills' => $leastEmployableSkills,
            'educationLevels' => $educationLevels,
            'totalEducationLevelsCount' => $totalEducationLevelsCount,
            'mostEmployableEducationLevels' => $mostEmployableEducationLevels,
            'leastEmployableEducationLevels' => $leastEmployableEducationLevels,
        ]);
    }

}
