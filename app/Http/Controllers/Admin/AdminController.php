<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;

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
use App\Models\Video;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
        $maxEmploymentType = 3;
        $maxAge = 3;
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


        // Fetch and process employment types
        $employmentInfo = EmploymentInfo::all();
        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy(); // Count occurrences of each employment type

        // Get most and least employable employment types
        $mostEmployableEmploymentTypes = $employmentTypes->sortDesc()->take($maxEmploymentType); // Top 5 most frequent employment types
        $leastEmployableEmploymentTypes = $employmentTypes->sort()->take($maxEmploymentType); // Bottom 5 least frequent employment types

        // Calculate 'Others' for employment types
        $otherEmploymentTypes = $employmentTypes->except($mostEmployableEmploymentTypes->keys())->sum();
        $otherLeastEmploymentTypes = $employmentTypes->except($leastEmployableEmploymentTypes->keys())->sum();
        $mostEmployableEmploymentTypes = $mostEmployableEmploymentTypes->put('Others', $otherEmploymentTypes);
        $leastEmployableEmploymentTypes = $leastEmployableEmploymentTypes->put('Others', $otherLeastEmploymentTypes);



        // Define age bins
        $ageBins = [
            '0-10' => [0, 10],
            '11-20' => [11, 20],
            '21-30' => [21, 30],
            '31-40' => [31, 40],
            '41-50' => [41, 50],
            '51-60' => [51, 60],
            '61+' => [61, 100],
        ];
        // Fetch all applicant profiles
        $applicantProfiles = ApplicantProfile::all();

        // Calculate ages and categorize them into bins
        $ages = $applicantProfiles->map(function ($profile) {
            return Carbon::parse($profile->birthdate)->age;
        });

        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        // Sort bins by most and least common
        $ageBinsCountFiltered = $ageBinsCount->filter(function ($count) {
            return $count > 0;
        });

        // Sort bins by most common
        $mostCommonAges = $ageBinsCount->sortDesc()->take($maxAge);

        // Sort bins by least common (after filtering out zeros)
        $leastCommonAges = $ageBinsCountFiltered->sort()->take($maxAge);



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
            'mostEmployableEmploymentTypes' => $mostEmployableEmploymentTypes, // Most employable employment types
            'leastEmployableEmploymentTypes' => $leastEmployableEmploymentTypes, // Least employable employment types
            'mostCommonAges' => $mostCommonAges,
            'leastCommonAges' => $leastCommonAges,
            'disabilityOccurrences' => $disabilityOccurrences, // Pass disability occurrences to the view
            'disabilityType' => $disabilityType,
            'hiredjobCount' => $hiredjobCount,
            'pendingjobCount' => $pendingjobCount

        ]);
    }

    public function getReplies($id)
    {
        $replies = Reply::where('message_id', $id)->get();
        Log::info('Replies Data:', $replies->toArray());

        return response()->json(['replies' => $replies]);
    }

    public function messages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('from', $email)->get();
        $replies = Reply::all();
        $users = User::all();

        return view('admin.messages', [
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
    }

    public function videoStore(Request $request, $location)
    {
        $validator = Validator::make($request->all(), [
            'video_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $videoId = $request->input('video_id');

        // Check if a video with the same location exists
        $video = Video::where('location', $location)->first();

        if ($video) {
            // Update the existing record
            $video->update(['video_id' => $videoId]);
            Session::flash('updatevideo', 'Video record updated successfully.');
        } else {
            // Create a new record
            Video::create(['video_id' => $videoId, 'location' => $location]);
            Session::flash('addvideo', 'You have successfully added a pre-recorded video.');
        }

        return redirect()->back()->with('success', 'Video ID processed successfully!');
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
            'reply_to' => $message->to,
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

    public function manageUsers(Request $request)
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
        $approvedCount = User::where('account_verification_status', 'approved')
            ->whereIn('usertype', ['user', 'employer'])
            ->count();

        $declinedCount = User::where('account_verification_status', 'declined')
            ->whereIn('usertype', ['user', 'employer'])
            ->count();

        $waitingforapprovalCount = User::where('account_verification_status', 'waiting for approval')
            ->whereIn('usertype', ['user', 'employer'])
            ->count();

        $pendingCount = User::where('account_verification_status', 'pending')
            ->whereIn('usertype', ['user', 'employer'])
            ->count();

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

    private function getYouTubeThumbnail($videoId)
    {
        return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
    }

    public function manageVideo()
    {
        // Retrieve all video records
        $videos = Video::all();

        // Add thumbnail URL to each video
        foreach ($videos as $video) {
            $video->thumbnail_url = $this->getYouTubeThumbnail($video->video_id);
        }

        // Pass the video records to the view
        return view('admin.managevideos', ['videos' => $videos]);
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
            $user->account_verification_status = 'approved'; // or 1, depending on your column type
            $user->save();

            return redirect()->back()->with('success', 'User verified successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }



    public function userpwdapplication($id)
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

        return view('admin.userpwdapplication', [
            'user' => $user,
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

        $pwdInformationData = PwdInformation::all();

        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy(); // Count occurrences of each disability
        $disabilityType = $pwdInformationData->pluck('disability')->countBy(); // Count occurrences of each disability
        $totaldisabilityOccurences = $disabilityOccurrences->sum(); // Total count of all education levels
        $totaldisabilityType = $disabilityType->sum(); // Total count of all education levels

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

        // Fetch employment types and calculate top/least employable employment types
        $employmentInfo = EmploymentInfo::all();
        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy();
        $mostEmployableEmploymentTypes = $employmentTypes->sortDesc();
        $leastEmployableEmploymentTypes = $employmentTypes->sort();
        $totalEmployableEmploymentTypes = $employmentTypes->sum();


        // Define age bins
        $ageBins = [
            '16-20' => [16, 20],
            '21-30' => [21, 30],
            '31-40' => [31, 40],
            '41-50' => [41, 50],
            '51-60' => [51, 60],
            '61+' => [61, 100],
        ];

        // Fetch all applicant profiles
        $applicantProfiles = ApplicantProfile::all();

        // Calculate ages and categorize them into bins
        $ages = $applicantProfiles->map(function ($profile) {
            return Carbon::parse($profile->birthdate)->age;
        });

        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        // Filter out bins with zero counts
        $ageBinsCountFiltered = $ageBinsCount->filter(function ($count) {
            return $count > 0;
        });

        // Sort bins by most common
        $mostCommonAges = $ageBinsCount->sortDesc();

        // Sort bins by least common (after filtering out zeros)
        $leastCommonAges = $ageBinsCountFiltered->sort();

        // Calculate total number of ages across all bins
        $totalCommonAges = $ageBinsCount->sum();



        return view('admin.details', [
            'totaldisabilityOccurences' => $totaldisabilityOccurences,
            'totaldisabilityType' => $totaldisabilityType,
            'disabilityOccurrences' => $disabilityOccurrences, // Pass disability occurrences to the view
            'disabilityType' => $disabilityType,
            'skills' => $topSkills, // Pass top skills to the view
            'othersCount' => $othersCount, // Pass others count to the view
            'totalSkillsCount' => $totalSkillsCount, // Pass total skills count to the view
            'type' => $type,
            'leastEmployableSkills' => $leastEmployableSkills,
            'educationLevels' => $educationLevels,
            'totalEducationLevelsCount' => $totalEducationLevelsCount,
            'totalEmployableEmploymentTypes' => $totalEmployableEmploymentTypes,


            'mostEmployableEducationLevels' => $mostEmployableEducationLevels,
            'leastEmployableEducationLevels' => $leastEmployableEducationLevels,
            'mostEmployableEmploymentTypes' => $mostEmployableEmploymentTypes, // Passing this to the view
            'leastEmployableEmploymentTypes' => $leastEmployableEmploymentTypes, // Passing this to the view
            'mostCommonAges' => $mostCommonAges,
            'leastCommonAges' => $leastCommonAges,
            'totalCommonAges' => $totalCommonAges,
        ]);
    }

}
