<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PwdInformation;
use App\Models\ApplicantProfile;
use App\Models\EducationalAttainment;
use App\Models\JobPreference;
use App\Models\EmploymentInfo;
use App\Models\PersonalInfo;
use App\Models\WorkExperience;
use App\Models\Skill;
use App\Models\JobApplication;
use App\Models\LanguageInput;
use App\Models\JobInfo;
use App\Models\Resume;

use App\Models\Employer;
use App\Models\Training;
use App\Models\MatchedJob;

use App\Models\AuditTrail;
use App\Models\Message;
use App\Models\Reply;
use App\Models\Video;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;



use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userCount = \App\Models\User::where('usertype_plain', 'user')->count();
        $employerCount = \App\Models\User::where('usertype_plain', 'employer')->count();
        $jobInfoCount = \App\Models\JobInfo::count();
        $hiredjobCount = \App\Models\JobApplication::where('status_plain', 'hired')->count();
        $pendingjobCount = \App\Models\JobApplication::where('status_plain', 'pending')->count();
        $accountCreations = \App\Models\User::where('account_verification_status_plain', 'waiting for approval')->count();
        $timeFrame = $request->input('time_frame', 'daily'); // Default to monthly



        $dateRanges = [
            '15days' => Carbon::now()->subDays(14)->startOfDay(),
            'daily' => Carbon::now()->subDays(30)->startOfDay(),
            'weekly' => Carbon::now()->subWeeks(12)->startOfWeek(),
            'monthly' => Carbon::now()->subMonths(11)->startOfMonth(), // Adjusted to 11 months to include the current month
        ];

        // Daily Counts: Last 15 days
        $dailyCounts = User::selectRaw("DATE(created_at) as date, COUNT(*) as count")
            ->where('created_at', '>=', $dateRanges['15days'])
            ->groupBy('date')
            ->pluck('count', 'date');

        // Weekly Counts: Last 12 weeks
        $dailyCounts30 = User::selectRaw("DATE(created_at) as date, COUNT(*) as count")
            ->where('created_at', '>=', $dateRanges['daily'])
            ->groupBy('date')
            ->pluck('count', 'date');

        // Monthly Counts: Last 12 months (11 months + current month)
        $monthlyCounts = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
            ->where('created_at', '>=', $dateRanges['monthly'])
            ->groupBy('month')
            ->pluck('count', 'month');

        // Yearly Counts (no specific date range needed, this query remains the same)
        $yearlyCounts = User::selectRaw("YEAR(created_at) as year, COUNT(*) as count")
            ->groupBy('year')
            ->pluck('count', 'year');


        // Initialize an array to hold the counts for each status across different date ranges
        $statusData = [
            'approved_daily15' => 0,
            'pending_daily15' => 0,
            'waiting_for_approval_daily15' => 0,
            'declined_daily15' => 0,

            'approved_daily30' => 0,
            'pending_daily30' => 0,
            'waiting_for_approval_daily30' => 0,
            'declined_daily30' => 0,

            'approved_monthly' => 0,
            'pending_monthly' => 0,
            'waiting_for_approval_monthly' => 0,
            'declined_monthly' => 0,

            'approved_yearly' => 0,
            'pending_yearly' => 0,
            'waiting_for_approval_yearly' => 0,
            'declined_yearly' => 0,
        ];

        // Date calculations
        $today = now();
        $last15Days = $today->subDays(15);
        $last30Days = $today->subDays(30);
        $today = Carbon::now();
        $last12MonthsStart = [];


        for ($i = 0; $i < 12; $i++) {
            $last12MonthsStart[] = $today->copy()->subMonths($i)->startOfMonth();
        }

        // Reverse the array if you want the oldest date first
        $last12MonthsStart = array_reverse($last12MonthsStart);

        $last12YearsStart = [];

        for ($i = 0; $i < 12; $i++) {
            $last12YearsStart[] = $today->copy()->subYears($i)->startOfYear();
        }

        $last12YearsStart = array_reverse($last12YearsStart);

        $statusData['approved_daily15'] = User::where('account_verification_status_plain', 'approved')
            ->where('created_at', '>=', $last15Days)
            ->count();

        $statusData['pending_daily15'] = User::where('account_verification_status_plain', 'pending')
            ->where('created_at', '>=', $last15Days)
            ->count();

        $statusData['waiting_for_approval_daily15'] = User::where('account_verification_status_plain', 'waiting for approval')
            ->where('created_at', '>=', $last15Days)
            ->count();

        $statusData['declined_daily15'] = User::where('account_verification_status_plain', 'declined')
            ->where('created_at', '>=', $last15Days)
            ->count();

        // Fetch counts for last 30 days
        $statusData['approved_daily30'] = User::where('account_verification_status_plain', 'approved')
            ->where('created_at', '>=', $last30Days)
            ->count();

        $statusData['pending_daily30'] = User::where('account_verification_status_plain', 'pending')
            ->where('created_at', '>=', $last30Days)
            ->count();

        $statusData['waiting_for_approval_daily30'] = User::where('account_verification_status_plain', 'waiting for approval')
            ->where('created_at', '>=', $last30Days)
            ->count();

        $statusData['declined_daily30'] = User::where('account_verification_status_plain', 'declined')
            ->where('created_at', '>=', $last30Days)
            ->count();

        // Fetch counts for last month
        $statusData['approved_monthly'] = User::where('account_verification_status_plain', 'approved')
            ->where('created_at', '>=', $last12MonthsStart)
            ->count();

        $statusData['pending_monthly'] = User::where('account_verification_status_plain', 'pending')
            ->where('created_at', '>=', $last12MonthsStart)
            ->count();

        $statusData['waiting_for_approval_monthly'] = User::where('account_verification_status_plain', 'waiting for approval')
            ->where('created_at', '>=', $last12MonthsStart)
            ->count();

        $statusData['declined_monthly'] = User::where('account_verification_status_plain', 'declined')
            ->where('created_at', '>=', $last12MonthsStart)
            ->count();

        // Fetch counts for last year
        $statusData['approved_yearly'] = User::where('account_verification_status_plain', 'approved')
            ->where('created_at', '>=', $last12YearsStart)
            ->count();

        $statusData['pending_yearly'] = User::where('account_verification_status_plain', 'pending')
            ->where('created_at', '>=', $last12YearsStart)
            ->count();

        $statusData['waiting_for_approval_yearly'] = User::where('account_verification_status_plain', 'waiting for approval')
            ->where('created_at', '>=', $last12YearsStart)
            ->count();

        $statusData['declined_yearly'] = User::where('account_verification_status_plain', 'declined')
            ->where('created_at', '>=', $last12YearsStart)
            ->count();


        $users = User::take(4)->get();
        $maxSkills = 3;
        $maxEducation = 3;
        $maxEmploymentType = 3;
        $maxAge = 3;
        $maxEmployerCount = 3;
        $maxDisabilities = 3;

        $workExperiences = WorkExperience::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->whereNotNull('skills')
            ->where('skills', '!=', '')
            ->get();


        $totalSkillsCount = $workExperiences->count(); // This counts the total approved users
        $skills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills)); // Split skills by comma and trim whitespace
        })->filter()
            ->countBy() // Count the occurrences of each skill
            ->sortDesc(); // Sort skills in descending order of occurrence

        // Calculate top skills
        $topSkills = $skills->take($maxSkills); // Get the top skills
        $topSkillsCount = $topSkills->sum(); // Sum of the top skills
        $othersCount = max(0, $totalSkillsCount - $topSkillsCount); // Count of others not in top skill
        $leastEmployableSkills = $skills->sort()->take($maxSkills);
        $leastEmployableSkillsCount = $leastEmployableSkills->sum();
        $leastEmployableOthersCount = max(0, $totalSkillsCount - $leastEmployableSkillsCount);


        $leastEmployableSkills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills));
        })->filter()
            ->countBy()
            ->sort()
            ->take($maxSkills);


        //Educational Attainment
        $educationalAttainments = EducationalAttainment::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $educationLevels = $educationalAttainments->pluck('educationLevel')->countBy();
        $mostEmployableEducationLevels = $educationLevels->sortDesc()->take($maxEducation);
        $leastEmployableEducationLevels = $educationLevels->sort()->take($maxEducation);

        $otherEducationLevels = $educationLevels->except($mostEmployableEducationLevels->keys())->sum();
        $otherleastEducationLevels = $educationLevels->except($leastEmployableEducationLevels->keys())->sum();
        $mostEmployableEducationLevels = $mostEmployableEducationLevels->put('Others', $otherEducationLevels);
        $leastEmployableEducationLevels = $leastEmployableEducationLevels->put('Others', $otherleastEducationLevels);


        // Employment Information
        $employmentInfo = EmploymentInfo::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy();

        $mostEmployableEmploymentTypes = $employmentTypes->sortDesc()->take($maxEmploymentType);
        $leastEmployableEmploymentTypes = $employmentTypes->sort()->take($maxEmploymentType);

        $otherEmploymentTypes = $employmentTypes->except($mostEmployableEmploymentTypes->keys())->sum();
        $otherLeastEmploymentTypes = $employmentTypes->except($leastEmployableEmploymentTypes->keys())->sum();
        $mostEmployableEmploymentTypes = $mostEmployableEmploymentTypes->put('Others', $otherEmploymentTypes);
        $leastEmployableEmploymentTypes = $leastEmployableEmploymentTypes->put('Others', $otherLeastEmploymentTypes);

        $ageBins = [
            '0-10' => [0, 10],
            '11-20' => [11, 20],
            '21-30' => [21, 30],
            '31-40' => [31, 40],
            '41-50' => [41, 50],
            '51-60' => [51, 60],
            '61+' => [61, 100],
        ];

        $applicantProfiles = ApplicantProfile::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $ages = $applicantProfiles->map(function ($profile) {
            return Carbon::parse($profile->birthdate)->age;
        });

        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        $ageBinsCountFiltered = $ageBinsCount->filter(function ($count) {
            return $count > 0;
        });

        $mostCommonAges = $ageBinsCount->sortDesc()->take($maxAge);
        $leastCommonAges = $ageBinsCountFiltered->sort()->take($maxAge);

        // PWD Information
        $pwdInformationData = PwdInformation::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy(); // Count occurrences of each disability
        $disabilityType = $pwdInformationData->pluck('disability')->countBy(); // Count occurrences of each disability


        $workExperience = WorkExperience::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $employerCounts = $workExperience->groupBy('employer_name')->map(function ($experience) {
            return $experience->count(); // Count how many times each employer appears
        });

        // Get the most and least frequent employers
        $mostFrequentEmployers = $employerCounts->sortDesc()->take($maxEmployerCount);
        $leastFrequentEmployers = $employerCounts->sort()->take($maxEmployerCount);
        $mostFrequentKeys = $mostFrequentEmployers->keys()->toArray();
        $leastFrequentKeys = $leastFrequentEmployers->keys()->toArray();

        $otherMostFrequentEmployers = $employerCounts->except($mostFrequentKeys)->sum();
        $otherLeastFrequentEmployers = $employerCounts->except($leastFrequentKeys)->sum();

        $mostFrequentEmployers = $mostFrequentEmployers->put('Others', $otherMostFrequentEmployers);
        $leastFrequentEmployers = $leastFrequentEmployers->put('Others', $otherLeastFrequentEmployers);


        $workExperience = $workExperience->map(function ($experience) {
            $fromDate = Carbon::parse($experience->from_date);
            $toDate = Carbon::parse($experience->to_date);
            $years = $fromDate->diffInYears($toDate);
            return $experience->setAttribute('years', $years);
        });

        $employerYears = $workExperience->groupBy('employer_name')->map(function ($experiences) {
            return $experiences->sum('years');
        });

        $mostFrequentEmployersByYears = $employerYears->sortDesc()->take($maxEmployerCount);
        $leastFrequentEmployersByYears = $employerYears->sort()->take($maxEmployerCount);

        $mostFrequentKeysByYears = $mostFrequentEmployersByYears->keys()->toArray();
        $leastFrequentKeysByYears = $leastFrequentEmployersByYears->keys()->toArray();

        $otherMostFrequentEmployersByYears = $employerYears->except($mostFrequentKeysByYears)->sum();
        $otherLeastFrequentEmployersByYears = $employerYears->except($leastFrequentKeysByYears)->sum();

        $mostFrequentEmployersByYears = $mostFrequentEmployersByYears->put('Others', $otherMostFrequentEmployersByYears);
        $leastFrequentEmployersByYears = $leastFrequentEmployersByYears->put('Others', $otherLeastFrequentEmployersByYears);

        $waitingUsersCount = User::where('account_verification_status_plain', 'waiting for approval')->count(); // Returns an integer

        $showNotification = false;
        if (!session('notification_shown') && $waitingUsersCount > 0) {
            $showNotification = true;
            session(['notification_shown' => true]);
        }


        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'dailyCounts' => $dailyCounts,
            'dailyCounts30' => $dailyCounts30,
            'monthlyCounts' => $monthlyCounts,
            'yearlyCounts' => $yearlyCounts,
            'waitingUsersCount' => $waitingUsersCount,
            'showNotification' => $showNotification,
            'users' => $users,
            'userCount' => $userCount,
            'employerCount' => $employerCount,
            'jobInfoCount' => $jobInfoCount,
            'skills' => $topSkills,
            'othersCount' => $othersCount,
            'totalSkillsCount' => $totalSkillsCount,
            'leastEmployableSkills' => $leastEmployableSkills,
            'leastEmployableOthersCount' => $leastEmployableOthersCount,
            'educationLevels' => $educationLevels,
            'mostEmployableEducationLevels' => $mostEmployableEducationLevels,
            'leastEmployableEducationLevels' => $leastEmployableEducationLevels,
            'mostEmployableEmploymentTypes' => $mostEmployableEmploymentTypes,
            'leastEmployableEmploymentTypes' => $leastEmployableEmploymentTypes,
            'mostCommonAges' => $mostCommonAges,
            'leastCommonAges' => $leastCommonAges,
            'mostFrequentEmployers' => $mostFrequentEmployers,
            'leastFrequentEmployers' => $leastFrequentEmployers,
            'mostFrequentEmployersByYears' => $mostFrequentEmployersByYears,
            'leastFrequentEmployersByYears' => $leastFrequentEmployersByYears,
            'disabilityOccurrences' => $disabilityOccurrences,
            'disabilityType' => $disabilityType,
            'hiredjobCount' => $hiredjobCount,
            'pendingjobCount' => $pendingjobCount,
            'accountCreations' => $accountCreations,
            'statusData' => $statusData
        ];

        return response()
            ->view('admin.dashboard', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
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
        $messages = Message::where('to', $email)->get();
        $replies = Reply::all();
        $adminusers = User::where('id', '!=', $userId)->get();

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'messages' => $messages,
            'adminusers' => $adminusers,
            'replies' => $replies,
        ];

        return response()
            ->view('admin.messages', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }

    public function sentmessages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('from', $email)->get();
        $replies = Reply::all();
        $adminusers = User::where('id', '!=', $userId)->get();

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the admin.messages view
        $data = [
            'messages' => $messages,
            'adminusers' => $adminusers,
            'replies' => $replies,
        ];

        // Return the admin.messages view with cache control headers
        return response()
            ->view('admin.messages', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }



    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        if ($message->to === auth()->user()->email) {
            $message->read_at = now();
            $message->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'You are not authorized to mark this message as read.'], 403);
    }


    public function editMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1200', // Adjust validation rules as necessary
        ]);

        $message = Message::findOrFail($id);

        $message->message = $request->input('message');
        $message->save(); // Save the changes to the database

        Session::flash('editmessage', "Message edited successfully!");
        return redirect()->back()->with('success', 'Message updated successfully!');
    }

    public function destroyMessage($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Message not found.'], 404);
        }

        $message->delete();
        Session::flash('destroymessage', value: "Message deleted successfully!");

        return response()->json(['message' => 'Message deleted successfully.'], 200);
    }


    public function videoStore(Request $request, $location)
    {
        $validator = Validator::make($request->all(), [
            'video_id' => 'required|string|unique:videos,video_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $videoId = $request->input('video_id');
        $user = Auth::user();

        $video = Video::where('location', $location)->first();

        if ($video) {
            $video->update(['video_id' => $videoId]);
            Session::flash('updatevideo', 'Video record updated successfully.');
            AuditTrail::create([
                'user_id' => $user->id,
                'user' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
                'action' => 'Modified Video in ' . '' . $location,
                'section' => 'Manage Videos',
            ]);
        } else {
            Video::create(['video_id' => $videoId, 'location' => $location]);
            Session::flash('addvideo', 'You have successfully added a pre-recorded video.');
            AuditTrail::create([
                'user_id' => $user->id,
                'user' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
                'action' => 'Added a Video in ' . '' . $location,
                'section' => 'Manage Videos',
            ]);
        }


        return redirect()->back()->with('success', 'Video ID processed successfully!');
    }

    public function deleteVideo(Request $request, $id)
    {
        // Find the video by its ID
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['message' => 'Video not found.'], 404);
        }

        // Delete the video
        $video->delete();

        return redirect()->back()->with('success', 'Video ID processed successfully!');
    }



    public function storeReply(Request $request)
    {
        $request->validate([
            'replyMessage' => 'required|string|max:300',
            'message_id' => 'required|exists:messages,id',
        ]);

        $message = Message::find($request->input('message_id'));
        if (!$message) {
            return redirect()->back()->withErrors('Message not found.');
        }

        Reply::create([
            'message_id' => $message->id,
            'message' => $request->input('replyMessage'),
            'reply_to' => $message->to,
            'reply_from' => auth()->user()->email,
        ]);

        $email = $request->input('reply.reply_from');
        $adminuser = Auth::user();

        AuditTrail::create([
            'user_id' => $adminuser->id,
            'user' => $adminuser->firstname . ' ' . $adminuser->middlename . ' ' . $adminuser->lastname,
            'action' => 'Replied to Message ID:' . ' ' . $message->id,
            'section' => 'Messages',
        ]);

        Session::flash('storereply', "Reply stored successfully!");
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }


    public function storeMessage(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        Message::create([
            'from' => auth()->user()->email,
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $email = $request->input('to');
        $adminuser = Auth::user();

        AuditTrail::create([
            'user_id' => $adminuser->id,
            'user' => $adminuser->firstname . ' ' . $adminuser->middlename . ' ' . $adminuser->lastname,
            'action' => 'Composed a Message to User: ' . ' ' . $email,
            'section' => 'Messages',
        ]);

        Session::flash('storemessage', "Message stored successfully!");
        return redirect()->back()->with('success', 'Message sent successfully!');
    }




    public function manageUsers(Request $request)
    {
        $query = User::query();

        // Extract filter values from request
        $status = $request->input('status', 'waiting for approval');
        $role = $request->input('role');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        $timeFrame = $request->input('time_frame', 'monthly'); // Default to monthly

        $query = User::with('pwdInformation')
            ->whereIn('usertype_plain', ['user', 'employer'])
            ->orderBy('created_at', 'desc'); // Order by 'created_at' from recent to oldest

        // Apply status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('account_verification_status_plain', $request->status);
        } else {
            // If status is not filled, apply the default
            $query->where('account_verification_status_plain', $status);
        }

        // Apply role filter
        if ($request->filled('role') && $request->role !== 'all') {
            $query->where('usertype_plain', $request->role);
        }

        // Apply date filters
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Paginate results
        $users = $query->paginate(12)->withQueryString();

        // Count users based on account verification status
        $approvedCount = User::where('account_verification_status_plain', 'approved')
            ->whereIn('usertype_plain', ['user', 'employer'])
            ->count();

        $waitingforapprovalCount = User::where('account_verification_status_plain', 'waiting for approval')
            ->whereIn('usertype_plain', ['user', 'employer'])
            ->count();

        $pendingCount = User::where('account_verification_status_plain', 'pending')
            ->whereIn('usertype_plain', ['user', 'employer'])
            ->count();

        $declinedCount = User::where('account_verification_status_plain', 'declined')
            ->whereIn('usertype_plain', ['user', 'employer'])
            ->count();


        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the admin.manageusers view
        $data = [
            'users' => $users,
            'approvedCount' => $approvedCount,
            'pendingCount' => $pendingCount,
            'waitingforapprovalCount' => $waitingforapprovalCount,
            'declinedCount' => $declinedCount,
        ];

        // Return the admin.manageusers view with cache control headers
        return response()
            ->view('admin.manageusers', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');


    }




    public function resetUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $message = $request->input('message'); // Capture the message from the form

            // Reset the user's application (your existing logic)
            $user->account_verification_status = 'pending';
            $user->account_verification_status_plain = 'pending';
            $user->save();

            $modelsToDelete = [
                PwdInformation::class,
                ApplicantProfile::class,
                EducationalAttainment::class,
                JobPreference::class,
                EmploymentInfo::class,
                PersonalInfo::class,
                LanguageInput::class,
                WorkExperience::class,
                Employer::class,
                Skill::class,
            ];

            foreach ($modelsToDelete as $model) {
                $records = $model::where('user_id', $user->id)->get();
                if ($records->isNotEmpty()) {
                    foreach ($records as $record) {
                        $record->delete();
                    }
                }
            }

            // Save message to the database or send it (you can adjust this part)
            if ($message) {
                // Example: Store the message in the database (assuming you have a Message model)
                Message::create([
                    'user_id' => $user->id,
                    'subject' => 'User Registration Form Reset',
                    'message' => $message,
                    'from' => Auth::user()->email,
                    'to' => $user->email,
                ]);
            }

            // Flash message and audit trail
            Session::flash('reset', 'User ID ' . $user->id . ' status has been reset successfully.');

            $adminuser = Auth::user();
            AuditTrail::create([
                'user_id' => $adminuser->id,
                'user' => $adminuser->firstname . ' ' . $adminuser->middlename . ' ' . $adminuser->lastname,
                'action' => 'Reset User : ' . $user->email,
                'section' => 'Manage Users',
            ]);

            return redirect()->route('admin.manageusers');
        } else {
            Session::flash('error', 'User not found.');
            return redirect()->route('admin.manageusers');
        }
    }



    public function audit(Request $request)
    {
        $action = $request->input('action');
        $section = $request->input('section');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Start building the query
        $query = AuditTrail::with('user');

        // Apply filters based on action
        if ($action = $request->input('action')) {
            $words = explode(' ', $action);
            foreach ($words as $word) {
                $query->where('action', 'like', '%' . $word . '%');
            }
        }

        // Apply section filter
        if ($section = $request->input('section')) {
            $query->whereRaw('LOWER(section) = ?', [strtolower($section)]);
        }


        // Apply date range filter
        if ($dateFrom = $request->input('date_from')) {
            $formattedDateFrom = Carbon::parse($dateFrom)->startOfDay();
            $query->whereDate('created_at', '>=', $formattedDateFrom);
        }

        if ($dateTo = $request->input('date_to')) {
            $formattedDateTo = Carbon::parse($dateTo)->endOfDay();
            $query->whereDate('created_at', '<=', $formattedDateTo);
        }

        // Get the filtered results with pagination and preserve query string
        $auditTrails = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Get current user and admin profile
        $user = Auth::user();
        $adminProfile = $user ? \App\Models\AdminProfile::where('admin_id', $user->id)->first() : null;

        // Count all audit trails (not filtered)
        $auditTrailsCount = \App\Models\AuditTrail::count();

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the admin.audittrail view
        $data = [
            'auditTrails' => $auditTrails,
            'auditTrailsCount' => $auditTrailsCount,
            'adminProfile' => $adminProfile,
        ];

        // Return the admin.audittrail view with cache control headers
        return response()
            ->view('admin.audittrail', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }






    public function employerapplication($id)
    {
        $employer = Employer::where('user_id', $id)->firstOrFail();

        $user = $employer->user;

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
        $videos = Video::all();

        foreach ($videos as $video) {
            $video->thumbnail_url = $this->getYouTubeThumbnail($video->video_id);
        }

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'videos' => $videos,
        ];

        return response()
            ->view('admin.managevideos', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
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
        $language = LanguageInput::where('user_id', $id)->get();
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
        $user = User::find($id);
        $adminuser = Auth::user();

        if ($user) {
            $user->account_verification_status = 'approved';
            $user->account_verification_status_plain = 'approved';
            $user->save();
            AuditTrail::create([
                'user_id' => $adminuser->id,
                'user' => $adminuser->firstname . ' ' . $adminuser->middlename . ' ' . $adminuser->lastname,
                'action' => 'Approved User : ' . ' ' . $user->id,
                'section' => 'Manage Users',
            ]);
            Session::flash('approve', 'User ID ' . $user->id . ' has been approved successfully.');

            return redirect()->route('admin.manageusers');
        }
        return redirect()->back()->with('error', 'User not found.');
    }


    public function declineuser(Request $request, $id)
    {
        // Validate the decline reason
        $request->validate([
            'declineReason' => 'required|string',
        ]);

        // Find the user
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update user status
        $user->account_verification_status = 'declined';
        $user->account_verification_status_plain = 'declined';
        $user->save();

        // Log actions
        try {
            AuditTrail::create([
                'user_id' => $user->id,
                'user' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
                'action' => 'Declined User: ' . $user->id,
                'section' => 'Manage Users',
            ]);

            Message::create([
                'subject' => 'User Application Declined',
                'from' => $user->email,
                'to' => $user->email,
                'message' => $request->declineReason,
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to log action: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to log action.');
        }
        Session::flash('decline', 'User ID ' . $user->id . ' has been declined successfully.');
        return redirect()->route('admin.manageusers');
    }



    public function removeUser($id)
    {
        $user = User::find($id);
        $adminUser = Auth::user();

        if ($user) {
            $userName = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
            $user->delete();

            // Log the action in the audit trail
            AuditTrail::create([
                'user_id' => $adminUser->id,
                'user' => $adminUser->firstname . ' ' . $adminUser->middlename . ' ' . $adminUser->lastname,
                'action' => 'Deleted User: ' . $userName . ' (ID: ' . $id . ')',
                'section' => 'Manage Users',
            ]);

            Session::flash('delete', 'User ID ' . $user->id . ' has been deleted successfully.');
            return redirect()->route('admin.manageusers');
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
        $workExperiences = WorkExperience::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();
        $skills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills)); // Split skills by comma and trim whitespace
        })->filter()
            ->countBy()
            ->sortDesc();

        $topSkills = $skills;
        $totalSkillsCount = $skills->sum();
        $topSkillsCount = $topSkills->sum();
        $othersCount = $totalSkillsCount - $topSkillsCount;

        $pwdInformationData = PwdInformation::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy();
        $disabilityType = $pwdInformationData->pluck('disability')->countBy();

        $totaldisabilityOccurences = $disabilityOccurrences->sum();
        $totaldisabilityType = $disabilityType->sum();


        // Filter out empty or null 'otherDisabilityDetails' and count occurrences
        $otherdisabilityDetails = $pwdInformationData->filter(function ($item) {
            return !empty($item['otherDisabilityDetails']);
        })->pluck('otherDisabilityDetails')->countBy();

        $totalotherdisabilityOccurences = $otherdisabilityDetails->sum();


        $disabilityDetails = $pwdInformationData->filter(function ($item) {
            return !empty($item['disabilityDetails']);
        })->pluck('disabilityDetails')->countBy();

        $totaldisabilityDetails = $disabilityDetails->sum();

        $leastEmployableSkills = $skills->sort();
        $leastEmployableSkillsCount = $leastEmployableSkills->sum();

        $educationalAttainments = EducationalAttainment::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $educationLevels = $educationalAttainments->pluck('educationLevel')->countBy();

        $totalEducationLevelsCount = $educationLevels->sum(); // Total count of all education levels

        $mostEmployableEducationLevels = $educationLevels->sortDesc(); // Sorted in descending order

        $leastEmployableEducationLevels = $educationLevels->sort(); // Sorted in ascending order

        $employmentInfo = EmploymentInfo::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

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

        $applicantProfiles = ApplicantProfile::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $ages = $applicantProfiles->map(function ($profile) {
            return Carbon::parse($profile->birthdate)->age;
        });

        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        $ageBinsCountFiltered = $ageBinsCount->filter(function ($count) {
            return $count > 0;
        });

        $mostCommonAges = $ageBinsCount->sortDesc();

        $leastCommonAges = $ageBinsCountFiltered->sort();

        $totalCommonAges = $ageBinsCount->sum();


        $workExperience = WorkExperience::whereHas('user', function ($query) {
            $query->where('account_verification_status_plain', 'approved');
        })->get();

        $employerCounts = $workExperience->groupBy('employer_name')->map(function ($experience) {
            return $experience->count();
        });



        $workExperience = $workExperience->map(function ($experience) {
            $fromDate = Carbon::parse($experience->from_date);
            $toDate = Carbon::parse($experience->to_date);
            $years = $fromDate->diffInYears($toDate);
            return $experience->setAttribute('years', $years);
        });

        $employerYears = $workExperience->groupBy('employer_name')->map(function ($experiences) {
            $totalYears = $experiences->sum('years');
            return $totalYears;
        });

        $employerYearsCounts = $employerYears->sortDesc();

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        if ($type === 'tophiringcompanies') {
            $hiringCompanies = JobApplication::where('status_plain', 'hired')
                ->select('company_name', DB::raw('COUNT(*) as hired_count'))
                ->groupBy('company_name')
                ->orderBy('hired_count', 'desc')
                ->get();

            $totalCompanyHires = JobApplication::where('status_plain', 'hired')->count();

            return view('admin.details', [
                'type' => $type,
                'hiringCompanies' => $hiringCompanies,
                'totalCompanyHires' => $totalCompanyHires
            ]);
        }


        if ($type === 'topcompaniesvacancies') {
            // Get all job info records
            $companiesWithVacancies = JobInfo::get()
                ->groupBy('company_name')
                ->map(function ($group) {
                    return [
                        'company_name' => $group->first()->company_name,
                        'total_vacancies' => $group->sum('vacancy')
                    ];
                })
                ->sortByDesc('total_vacancies')
                ->values();

            // Calculate total vacancies
            $totalVacancies = JobInfo::sum('vacancy');

            return view('admin.details', [
                'type' => $type,
                'companiesWithVacancies' => $companiesWithVacancies,
                'totalVacancies' => $totalVacancies
            ]);
        }

        if ($type === 'topjobpostingcompanies') {
            $jobPostingCompanies = JobInfo::select('company_name', DB::raw('COUNT(*) as job_count'))
                ->groupBy('company_name')
                ->orderBy('job_count', 'desc')
                ->get();

            $totalJobPosts = JobInfo::count();

            return view('admin.details', [
                'type' => $type,
                'jobPostingCompanies' => $jobPostingCompanies,
                'totalJobPosts' => $totalJobPosts
            ]);
        }

        if ($type === 'topappliedjobs') {
            $appliedJobs = JobApplication::select('title', DB::raw('COUNT(*) as application_count'))
                ->groupBy('title')
                ->orderBy('application_count', 'desc')
                ->get()
                ->map(function ($job) {
                    // Decrypt the title if it's encrypted
                    return [
                        'title' => $job->title, // This will automatically be decrypted by the model
                        'application_count' => $job->application_count
                    ];
                });

            $totalApplications = JobApplication::count();

            return view('admin.details', [
                'type' => $type,
                'appliedJobs' => $appliedJobs,
                'totalApplications' => $totalApplications
            ]);
        }

        if ($type === 'tophiredpositions') {
            $hiredPositions = JobApplication::where('status_plain', 'hired')
                ->select('title', DB::raw('COUNT(*) as hired_count'))
                ->groupBy('title')
                ->orderBy('hired_count', 'desc')
                ->get()
                ->map(function ($position) {
                    return [
                        'title' => $position->title, // Will be automatically decrypted
                        'hired_count' => $position->hired_count
                    ];
                });

            $totalPositionHires = JobApplication::where('status_plain', 'hired')->count();

            return view('admin.details', [
                'type' => $type,
                'hiredPositions' => $hiredPositions,
                'totalPositionHires' => $totalPositionHires
            ]);
        }

        if ($type === 'topvacantjobs') {
            $vacantJobs = JobInfo::select('title', 'company_name', 'vacancy')
                ->orderBy('vacancy', 'desc')
                ->get();

            $totalVacancies = JobInfo::sum('vacancy');

            return view('admin.details', [
                'type' => $type,
                'vacantJobs' => $vacantJobs,
                'totalVacancies' => $totalVacancies
            ]);
        }

        if ($type === 'jobtypehiring') {
            $jobTypeHiring = JobApplication::where('status_plain', 'hired')
                ->select('job_type', DB::raw('COUNT(*) as hired_count'))
                ->groupBy('job_type')
                ->orderBy('hired_count', 'desc')
                ->get();

            $totalJobTypeHires = JobApplication::where('status_plain', 'hired')->count();

            return view('admin.details', [
                'type' => $type,
                'jobTypeHiring' => $jobTypeHiring,
                'totalJobTypeHires' => $totalJobTypeHires
            ]);
        }


        // Prepare the data for the admin.details view
        $data = [
            'totaldisabilityOccurences' => $totaldisabilityOccurences,
            'otherdisabilityDetails' => $otherdisabilityDetails,
            'totalotherdisabilityOccurences' => $totalotherdisabilityOccurences,
            'totaldisabilityType' => $totaldisabilityType,
            'disabilityType' => $disabilityType,
            'disabilityOccurrences' => $disabilityOccurrences,
            'disabilityDetails' => $disabilityDetails,
            'totaldisabilityDetails' => $totaldisabilityDetails,
            'skills' => $topSkills,
            'othersCount' => $othersCount,
            'totalSkillsCount' => $totalSkillsCount,
            'type' => $type,
            'leastEmployableSkills' => $leastEmployableSkills,
            'educationLevels' => $educationLevels,
            'totalEducationLevelsCount' => $totalEducationLevelsCount,
            'totalEmployableEmploymentTypes' => $totalEmployableEmploymentTypes,
            'mostEmployableEducationLevels' => $mostEmployableEducationLevels,
            'leastEmployableEducationLevels' => $leastEmployableEducationLevels,
            'mostEmployableEmploymentTypes' => $mostEmployableEmploymentTypes,
            'leastEmployableEmploymentTypes' => $leastEmployableEmploymentTypes,
            'mostCommonAges' => $mostCommonAges,
            'leastCommonAges' => $leastCommonAges,
            'totalCommonAges' => $totalCommonAges,
            'employerCounts' => $employerCounts,
            'employerYearsCounts' => $employerYearsCounts,
        ];

        // Return the admin.details view with cache control headers
        return response()
            ->view('admin.details', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');



    }
    public function showAdminTrainings()
    {
        // Get certifications and their counts from EducationalAttainment
        $educationalCertifications = EducationalAttainment::select('certifications')->get();

        // Initialize arrays to hold certification names and counts
        $educationalCertificationNames = [];
        $educationalCertificationCounts = [];

        foreach ($educationalCertifications as $record) {
            // Split the certifications string by comma and trim whitespace
            $certifications = array_map('trim', explode(',', $record->certifications));

            // Count each certification
            foreach ($certifications as $certification) {
                if (!empty($certification)) {
                    if (isset($educationalCertificationCounts[$certification])) {
                        $educationalCertificationCounts[$certification]++;
                    } else {
                        $educationalCertificationCounts[$certification] = 1;
                        $educationalCertificationNames[] = $certification; // Add new certification to names
                    }
                }
            }
        }

        // Sort educational certifications counts in descending order and get top 10
        arsort($educationalCertificationCounts);
        $topEducationalCertifications = array_slice($educationalCertificationCounts, 0, 10, true); // Get top 10 certifications
        $topEducationalNames = array_intersect_key($educationalCertificationNames, $topEducationalCertifications);

        // Calculate total count of certifications
        $totalEducationalCount = array_sum($topEducationalCertifications); // Sum of counts

        // Get job certifications and their counts from JobInfo
        $jobCertifications = JobInfo::select('training_qualifications')->get();

        // Initialize arrays for job certifications
        $jobCertificationNames = [];
        $jobCertificationCount = [];

        // Loop through each record and split job qualifications
        foreach ($jobCertifications as $jobRecord) {
            // Split qualifications based on bullet point and trim whitespace
            $qualifications = array_filter(array_map('trim', explode('•', $jobRecord->training_qualifications)));

            foreach ($qualifications as $qualification) {
                // Clean the qualification by removing unwanted characters
                $cleanedQualification = preg_replace('/[.,-]/', '', $qualification); // Remove dots, commas, and hyphens

                // Check if the cleaned qualification exists in the count array
                if (isset($jobCertificationCount[$cleanedQualification])) {
                    $jobCertificationCount[$cleanedQualification]++;
                } else {
                    $jobCertificationCount[$cleanedQualification] = 1; // Initialize the count
                    $jobCertificationNames[] = $cleanedQualification; // Add new qualification to names
                }
            }
        }

        // Sort job certifications counts in descending order and get top 10
        arsort($jobCertificationCount);
        $topJobCertifications = array_slice($jobCertificationCount, 0, 10, true);
        $topJobNames = array_intersect_key($jobCertificationNames, $topJobCertifications);

        // Calculate total count of job qualifications
        $totalJobCertificationCount = array_sum($topJobCertifications);




        $resumeCertifications = Resume::select('user_id', 'certifications')->get(); // Get user IDs and certifications

        // Initialize arrays for unmatched resume certifications
        $resumeCertificationNames = [];
        $resumeCertificationCount = [];

        // Loop through each resume to find unmatched certifications
        foreach ($resumeCertifications as $resume) {
            // Get user ID and unmatched certifications list
            $userId = $resume->user_id;
            $unmatchedCertifications = array_map('trim', explode(',', $resume->certifications));

            // Fetch training qualifications from the MatchedJob table for the same user
            $matchedJobQualifications = MatchedJob::where('user_id', $userId)->pluck('training_qualifications')->toArray();

            // Flatten the array of job qualifications, splitting by hyphen and cleaning each qualification
            $jobQualifications = array_unique(array_merge(...array_map(function ($qual) {
                return array_map(function ($q) {
                    return preg_replace('/[^\w\s]/', '', trim($q)); // Remove unwanted characters
                }, explode('-', $qual)); // Split by hyphen
            }, $matchedJobQualifications)));

            // Loop through job qualifications to find those that are NOT in the unmatched certifications
            foreach ($jobQualifications as $qualification) {
                if (!empty($qualification)) {
                    $cleanedQualification = preg_replace('/[^\w\s]/', '', trim($qualification));

                    $matched = false;

                    // Loop through unmatched certifications
                    foreach ($unmatchedCertifications as $certification) {
                        $cleanedCertification = preg_replace('/[^\w\s]/', '', trim($certification));
                        if (stripos($cleanedCertification, $cleanedQualification) !== false) {
                            $matched = true;
                            break;
                        }
                    }

                    // If no match was found for this qualification, count it as unmatched
                    if (!$matched) {
                        $resumeCertificationCount[$qualification] = ($resumeCertificationCount[$qualification] ?? 0) + 1;
                        $resumeCertificationNames[] = $qualification;
                    }
                }
            }
        }

        // Sort unmatched certifications counts in descending order and get top 10
        arsort($resumeCertificationCount);
        $topResumeCertifications = array_slice($resumeCertificationCount, 0, 10, true); // Get top 10 unmatched certifications

        // Calculate total count of unmatched resume certifications
        $totalUnmatchedCertificationCount = array_sum($topResumeCertifications);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the admin.trainings view
        $data = [
            'educationalCertificationNames' => array_keys($topEducationalCertifications),
            'educationalCertificationCounts' => array_values($topEducationalCertifications), // Count values
            'totalEducationalCount' => $totalEducationalCount, // Pass the total count to the view
            'jobCertificationNames' => array_keys($topJobCertifications),
            'jobCertificationCount' => array_values($topJobCertifications), // Count values for job
            'totalJobCertificationCount' => $totalJobCertificationCount, // Pass total job count to the view
            'resumeCertificationNames' => array_keys($topResumeCertifications),
            'resumeCertificationCount' => array_values($topResumeCertifications), // Count values for resumes
            'totalResumeCertificationCount' => $totalUnmatchedCertificationCount, // Pass total resume count to the view
        ];

        // Return the admin.trainings view with cache control headers
        return response()
            ->view('admin.trainings', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }





    public function updateTrainings(Request $request, $id)
    {
        Session::flash('updatetraining', 'Training updated successfully!');

        $validated = $request->validate([
            'location' => 'required|string|max:300',
            'name' => 'required|string|max:300',
            'address' => 'required|string|max:255',
            'contactno' => 'required|string|max:11',
            'description' => 'nullable|string|max:1200',
        ]);

        $training = Training::findOrFail($id);
        $training->update($validated);

        return redirect()->back()->with('success', value: 'Training updated successfully!');
    }


    public function storeTraining(Request $request)
    {
        Session::flash('storetraining', 'Training added successfully!');

        // Validate the request datas
        $validatedData = $request->validate([
            'location' => 'required|string|max:300',
            'name' => 'required|string|max:300',
            'address' => 'required|string|max:255',
            'contactno' => 'required|string|max:11',
            'description' => 'nullable|string|max:1200',
        ]);

        $validatedData['admin_id'] = Auth::id(); // Or use Auth::user()->id if you need the full User object
        $training = Training::create($validatedData);
        return redirect()->back()->with('success', value: 'Training added successfully!');
    }


    public function destroyTrainings($id)
    {
        Session::flash('destroytraining', "Training: {$id} deleted successfully!");
        $training = Training::findOrFail($id);
        $training->delete();
        return redirect()->back()->with('success', value: 'Training added successfully!');
    }

    public function employmentAnalytics()
    {
        // Basic metrics
        $totalHired = JobApplication::where('status_plain', 'hired')->count();
        $totalCompanies = Employer::count();

        // Job posts and vacancies
        $activeJobPosts = JobInfo::where('vacancy', '>', 0)->count();
        $totalVacancies = JobInfo::where('vacancy', '>', 0)->sum('vacancy');

        // Applications and hiring rate
        $totalApplications = JobApplication::count();
        $hiringRate = $totalApplications > 0
            ? round(($totalHired / $totalApplications) * 100, 1)
            : 0;

        // For the graph (top 10)
        $topHiringCompaniesGraph = JobApplication::where('status_plain', 'hired')
            ->select('company_name', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('company_name')
            ->orderBy('hired_count', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5)
        $topHiringCompanies = JobApplication::where('status_plain', 'hired')
            ->select('company_name', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('company_name')
            ->orderBy('hired_count', 'desc')
            ->take(5)
            ->get();

        // Get total hires from ALL companies
        $totalCompanyHires = JobApplication::where('status_plain', 'hired')->count();

        // Get total CURRENT vacancies from ALL companies (not just top ones)
        $totalAllVacancies = DB::table('jobinfos')
            ->where('vacancy', '>', 0)
            ->where('to_date', '>=', now())
            ->sum('vacancy');

        // Monthly hiring trend
        $hiredPerMonth = JobApplication::where('status_plain', 'hired')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total_hired')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Job type distribution
        $hiredByJobType = JobApplication::where('status_plain', 'hired')
            ->select('job_type', DB::raw('COUNT(*) as count'))
            ->groupBy('job_type')
            ->get();

        // Least Hiring Companies
        $leastHiringCompanies = JobApplication::where('status_plain', 'hired')
            ->select('company_name', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('company_name')
            ->having('hired_count', '>', 0)
            ->orderBy('hired_count', 'asc')
            ->take(10)
            ->get();

        // Company hiring distribution
        $hiredByCompany = JobApplication::where('status_plain', 'hired')
            ->select('company_name', DB::raw('COUNT(*) as count'))
            ->groupBy('company_name')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        // Get top hired positions
        $topHiredPositions = JobApplication::where('status_plain', 'hired')
            ->select('title', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('title')
            ->orderBy('hired_count', 'desc')
            ->take(10)
            ->get();

        // For the graph (top 10)
        $topVacantJobsGraph = DB::table('jobinfos')
            ->select('title', 'vacancy', 'company_name')
            ->where('vacancy', '>', 0)
            ->orderBy('vacancy', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5)
        $topVacantJobs = DB::table('jobinfos')
            ->select('title', 'vacancy', 'company_name')
            ->where('vacancy', '>', 0)
            ->orderBy('vacancy', 'desc')
            ->take(5)
            ->get();

        // Get total vacancies from ALL jobs
        $totalAllVacancies = DB::table('jobinfos')
            ->where('vacancy', '>', 0)
            ->sum('vacancy');

        // Get companies with most job postings
        $topJobPostingCompanies = DB::table('jobinfos')
            ->select('company_name', DB::raw('COUNT(*) as job_count'))
            ->groupBy('company_name')
            ->orderBy('job_count', 'desc')
            ->take(10)
            ->get();

        // For the graph (top 10)
        $topCompaniesWithVacanciesGraph = DB::table('jobinfos')
            ->select('company_name', DB::raw('SUM(vacancy) as total_vacancies'))
            ->where('vacancy', '>', 0)
            ->where('to_date', '>=', now())
            ->groupBy('company_name')
            ->orderBy('total_vacancies', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5)
        $topCompaniesWithVacancies = DB::table('jobinfos')
            ->select('company_name', DB::raw('SUM(vacancy) as total_vacancies'))
            ->where('vacancy', '>', 0)
            ->where('to_date', '>=', now())
            ->groupBy('company_name')
            ->orderBy('total_vacancies', 'desc')
            ->take(5)
            ->get();

        // Get total vacancies from ALL companies
        $totalAllCompanyVacancies = DB::table('jobinfos')
            ->where('vacancy', '>', 0)
            ->where('to_date', '>=', now())
            ->sum('vacancy');


        // For the graph (top 10)
        $topHiredPositionsGraph = JobApplication::where('status_plain', 'hired')
            ->select('title', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('title')
            ->orderBy('hired_count', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5)
        $topHiredPositions = JobApplication::where('status_plain', 'hired')
            ->select('title', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('title')
            ->orderBy('hired_count', 'desc')
            ->take(5)
            ->get();

        // Get total hires from ALL positions
        $totalPositionHires = JobApplication::where('status_plain', 'hired')->count();

        // For the graph (top 10)
        $topJobPostingCompaniesGraph = DB::table('jobinfos')
            ->select('company_name', DB::raw('COUNT(*) as job_count'))
            ->groupBy('company_name')
            ->orderBy('job_count', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5)
        $topJobPostingCompanies = DB::table('jobinfos')
            ->select('company_name', DB::raw('COUNT(*) as job_count'))
            ->groupBy('company_name')
            ->orderBy('job_count', 'desc')
            ->take(5)
            ->get();

        // Get total job posts from ALL companies
        $totalAllJobPosts = DB::table('jobinfos')->count();


        // For the graph (top 10 most applied jobs)
        $topAppliedJobsGraph = JobApplication::select('title', DB::raw('COUNT(*) as application_count'))
            ->groupBy('title')
            ->orderBy('application_count', 'desc')
            ->take(10)
            ->get();

        // For the table (top 5 most applied jobs)
        $topAppliedJobs = JobApplication::select('title', DB::raw('COUNT(*) as application_count'))
            ->groupBy('title')
            ->orderBy('application_count', 'desc')
            ->take(5)
            ->get();

        // Get total applications across all jobs
        $totalAllApplications = JobApplication::count();

        // Hiring Timeline Analysis
        $hiringTimeline = JobApplication::where('status_plain', 'hired')
            ->select(
                DB::raw('DATE_FORMAT(updated_at, "%M %Y") as month'),
                DB::raw('COUNT(*) as hired_count')
            )
            ->groupBy('month')
            ->orderBy(DB::raw('DATE_FORMAT(updated_at, "%Y-%m")'))
            ->take(12)  // Last 12 months
            ->get();

        // Job Type Hiring Distribution
        $jobTypeHiring = JobApplication::where('status_plain', 'hired')
            ->select('job_type', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('job_type')
            ->orderBy('hired_count', 'desc')
            ->get();

        // Calculate total hires for percentage
        $totalJobTypeHires = $jobTypeHiring->sum('hired_count');

        $totalMonthlyHires = $hiringTimeline->sum('hired_count');

        try {
            // Get hired PWDs with their disability information
            $hiredPwds = JobApplication::where('job_applications.status_plain', 'hired')
                ->join('users', 'job_applications.user_id', '=', 'users.id')
                ->join('pwd_information', 'users.id', '=', 'pwd_information.user_id')
                ->select('pwd_information.disability')
                ->get();

            // Decrypt and count disabilities
            $disabilityCount = collect();
            foreach ($hiredPwds as $pwd) {
                try {
                    // Manually decrypt the disability value
                    $decryptedDisability = Crypt::decryptString($pwd->disability);
                    $disabilityCount[$decryptedDisability] = ($disabilityCount[$decryptedDisability] ?? 0) + 1;
                } catch (\Exception $e) {
                    \Log::error('Decryption error: ' . $e->getMessage());
                    continue;
                }
            }

            // Format for chart
            $disabilityTypeHiring = $disabilityCount->map(function ($count, $disability) {
                return [
                    'disability' => $disability,
                    'count' => $count
                ];
            })->values();

            $totalDisabilityHires = $disabilityTypeHiring->sum('count');

        } catch (\Exception $e) {
            \Log::error('Error in disability analysis: ' . $e->getMessage());
            $disabilityTypeHiring = collect();
            $totalDisabilityHires = 0;
        }

        // Get Past Work Experience Analysis
        $pastPositions = DB::table('work_experiences')
            ->select('position_held', DB::raw('COUNT(*) as position_count'))
            ->whereNotNull('position_held')
            ->groupBy('position_held')
            ->orderBy('position_count', 'desc')
            ->take(10)
            ->get();

        $pastEmployers = DB::table('work_experiences')
            ->select('employer_name', DB::raw('COUNT(*) as employer_count'))
            ->whereNotNull('employer_name')
            ->groupBy('employer_name')
            ->orderBy('employer_count', 'desc')
            ->take(10)
            ->get();

        // Get total experiences
        $totalPastExperiences = DB::table('work_experiences')->count();

        // Get skills analysis (splitting the skills string and counting occurrences)
        $skillsAnalysis = DB::table('work_experiences')
            ->whereNotNull('skills')
            ->get()
            ->flatMap(function ($experience) {
                return explode(', ', $experience->skills);
            })
            ->countBy()
            ->sortDesc()
            ->take(10);


        $hiringTrends = [
            // Last 15 days - show individual days
            'last_15_days' => JobApplication::where('status_plain', 'hired')
                ->where('updated_at', '>=', now()->subDays(15))
                ->select(
                    DB::raw('DATE(updated_at) as date'),
                    DB::raw('COUNT(*) as hired_count')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->date)->format('M d'),
                        'hired_count' => $item->hired_count
                    ];
                }),

            // Last 30 days - show individual days
            'last_month' => JobApplication::where('status_plain', 'hired')
                ->where('updated_at', '>=', now()->subDays(30))
                ->select(
                    DB::raw('DATE(updated_at) as date'),
                    DB::raw('COUNT(*) as hired_count')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->date)->format('M d'),
                        'hired_count' => $item->hired_count
                    ];
                }),

            // Last year - show only months
            'last_year' => JobApplication::where('status_plain', 'hired')
                ->where('updated_at', '>=', now()->startOfYear())
                ->select(
                    DB::raw('DATE_FORMAT(updated_at, "%Y-%m") as month'),
                    DB::raw('COUNT(*) as hired_count')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->month . '-01')->format('F'),
                        'hired_count' => $item->hired_count
                    ];
                })
        ];

        // Fill in missing dates for 15 days
        $last15Days = collect();
        for ($i = 14; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('M d');
            $hiredCount = collect($hiringTrends['last_15_days'])->firstWhere('date', $date);
            $last15Days->push([
                'date' => $date,
                'hired_count' => $hiredCount ? $hiredCount['hired_count'] : 0
            ]);
        }
        $hiringTrends['last_15_days'] = $last15Days;

        // Fill in missing dates for 30 days
        $last30Days = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('M d');
            $hiredCount = collect($hiringTrends['last_month'])->firstWhere('date', $date);
            $last30Days->push([
                'date' => $date,
                'hired_count' => $hiredCount ? $hiredCount['hired_count'] : 0
            ]);
        }
        $hiringTrends['last_month'] = $last30Days;

        // Fill in missing months for the year
        $lastYear = collect();
        $currentMonth = now()->startOfYear();
        while ($currentMonth <= now()) {
            $monthKey = $currentMonth->format('F');
            $hiredCount = collect($hiringTrends['last_year'])->firstWhere('date', $monthKey);
            $lastYear->push([
                'date' => $monthKey,
                'hired_count' => $hiredCount ? $hiredCount['hired_count'] : 0
            ]);
            $currentMonth->addMonth();
        }
        $hiringTrends['last_year'] = $lastYear;



        $applicationTrends = [
            // Last 15 days applications
            'last_15_days' => JobApplication::where('created_at', '>=', now()->subDays(15))
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as application_count')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->date)->format('M d'),
                        'application_count' => $item->application_count
                    ];
                }),

            // Last 30 days applications
            'last_month' => JobApplication::where('created_at', '>=', now()->subDays(30))
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as application_count')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->date)->format('M d'),
                        'application_count' => $item->application_count
                    ];
                }),

            // This year's applications by month
            'last_year' => JobApplication::where('created_at', '>=', now()->startOfYear())
                ->select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                    DB::raw('COUNT(*) as application_count')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => Carbon::parse($item->month . '-01')->format('F'),
                        'application_count' => $item->application_count
                    ];
                })
        ];

        // Fill in missing dates for 15 days
        $last15Days = collect();
        for ($i = 14; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('M d');
            $applicationCount = collect($applicationTrends['last_15_days'])->firstWhere('date', $date);
            $last15Days->push([
                'date' => $date,
                'application_count' => $applicationCount ? $applicationCount['application_count'] : 0
            ]);
        }
        $applicationTrends['last_15_days'] = $last15Days;

        // Fill in missing dates for 30 days
        $last30Days = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('M d');
            $applicationCount = collect($applicationTrends['last_month'])->firstWhere('date', $date);
            $last30Days->push([
                'date' => $date,
                'application_count' => $applicationCount ? $applicationCount['application_count'] : 0
            ]);
        }
        $applicationTrends['last_month'] = $last30Days;

        // Fill in missing months for the year
        $lastYear = collect();
        $currentMonth = now()->startOfYear();
        while ($currentMonth <= now()) {
            $monthKey = $currentMonth->format('F');
            $applicationCount = collect($applicationTrends['last_year'])->firstWhere('date', $monthKey);
            $lastYear->push([
                'date' => $monthKey,
                'application_count' => $applicationCount ? $applicationCount['application_count'] : 0
            ]);
            $currentMonth->addMonth();
        }
        $applicationTrends['last_year'] = $lastYear;

        return view('admin.employment-analytics', compact(
            'totalHired',
            'totalCompanies',
            'activeJobPosts',
            'totalVacancies',
            'totalApplications',
            'hiringRate',
            'hiredPerMonth',
            'hiredByJobType',
            'hiredByCompany',
            'topHiringCompanies',
            'topHiringCompaniesGraph',
            'leastHiringCompanies',
            'topHiredPositions',
            'topVacantJobsGraph',
            'totalAllJobPosts',
            'totalAllVacancies',
            'topHiredPositionsGraph',
            'topHiredPositions',
            'totalPositionHires',
            'topJobPostingCompaniesGraph',
            'topJobPostingCompanies',
            'topCompaniesWithVacanciesGraph',
            'totalAllCompanyVacancies',
            'topVacantJobs',
            'topCompaniesWithVacancies',
            'topAppliedJobsGraph',
            'topAppliedJobs',
            'totalAllApplications',
            'totalCompanyHires',
            'hiringTimeline',
            'jobTypeHiring',
            'totalJobTypeHires',
            'disabilityTypeHiring',
            'totalDisabilityHires',
            'pastPositions',
            'pastEmployers',
            'totalPastExperiences',
            'skillsAnalysis',
            'totalMonthlyHires',
            'hiringTrends',
            'applicationTrends'
        ));
    }
}
