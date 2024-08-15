<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\EmployerProfilePictureController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SaveJobController;
use App\Http\Controllers\TopJobOpeningController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobInfoController;
use App\Http\Controllers\EmployerSetupController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('welcome');
Route::get('aboutus', [DashboardController::class, 'aboutus'])->name('aboutus');
Route::get('contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('faq', [DashboardController::class, 'faq'])->name('faq');
Route::get('findjobs', [DashboardController::class, 'findjobs'])->name('findjobs');
Route::get('/search/jobs', [DashboardController::class, 'searchjobs'])->name('welcome.search');
Route::post('/contact/messages', [ContactUsController::class, 'storeMessage'])->name('contact.messages.store');

Route::get('/locale/{lang}', [LocalizationController::class, 'setLocale'])->name('toggle.language');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/updatepic', [ProfileController::class, 'updatepic'])->name('profile.updatepic');

});


Route::middleware('auth')->group(function () {
    Route::get('/editemployment', [WorkExperienceController::class, 'create'])->name('editemployment');
    Route::post('/editemployment', [WorkExperienceController::class, 'store']);
    Route::delete('/editemployment/{id}', [WorkExperienceController::class, 'destroy'])->name('workexp.destroy');
});

require __DIR__ . '/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// User routes
Route::middleware(['auth', 'userMiddleware', 'checkVerificationStatus'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/jobs/remarks/{remarks}', [UserController::class, 'remarks'])->name('show.remarks');
    Route::get('/dashboard/matchedjobs', [UserController::class, 'matchindex'])->name('dashboard.match');
    Route::get('/dashboard/resumeupload', [UserController::class, 'resumeupload'])->name('dashboard.resumeupload');
    Route::post('/resume-matched-jobs', [UserController::class, 'fetchResumeMatchedJobs'])->name('resume.uploadresults');

    Route::get('/dashboard/jobs', [UserController::class, 'search'])->name('jobs.search');
    Route::get('/jobs/{company_name}/{id}', [UserController::class, 'jobinfo'])->name('jobs.info');
    Route::post('jobs/apply/{company_name}/{id}', [UserController::class, 'applyForJob'])->name('applyForJob');
    Route::post('/applications/mark-all-as-read', [ApplicationController::class, 'markAllAsRead'])->name('applications.markAllAsRead');
    Route::post('/save-job/{id}/{company_name}', [SaveJobController::class, 'save'])->name('save.job');
    Route::get('savedjobs', [SaveJobController::class, 'index'])->name('savedjobs');
    Route::delete('/savedjobs/{id}', [SaveJobController::class, 'destroy'])->name('save.destroy');

    Route::patch('/dashboard/job-preferences', [UserController::class, 'updatepreferences'])->name('jobpref.updatepreferences');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/user', [AdminController::class, 'manage'])->name('admin.user');
    Route::get('/admin/details/{type}', [AdminController::class, 'details'])->name('admin.details');
    Route::get('/admin/manageusers', [AdminController::class, 'manageUsers'])->name('admin.manageusers');
    Route::get('/admin/audit', [AdminController::class, 'audit'])->name('admin.audit');

    Route::get('/admin/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::post('/admin/messages', [AdminController::class, 'storeMessage'])->name('admin.messages.store');

    Route::post('/admin/replies', [AdminController::class, 'storeReply'])->name('admin.replies.store');
    Route::get('/admin/managevideos', [AdminController::class, 'manageVideo'])->name('admin.managevideos');
    Route::post('/video/store/{location}', [AdminController::class, 'videoStore'])->name('admin.video.store');

    Route::get('/admin/messages/{id}/replies', [AdminController::class, 'getReplies'])->name('admin.replies.retrieve');

    Route::get('/export/skillscsv', [ExportController::class, 'skillsExportCSV'])->name('exportskills.csv');
    Route::get('/export/skillspdf', [ExportController::class, 'skillsExportPDF'])->name('exportskills.pdf');
    Route::get('/export/educationcsv', [ExportController::class, 'educationExportCSV'])->name('exporteducation.csv');
    Route::get('/export/educationpdf', [ExportController::class, 'educationExportPDF'])->name('exporteducation.pdf');
    Route::get('/export/disabilityoccurencecsv', [ExportController::class, 'disabilityOccurenceExportCSV'])->name('exportDisabilityOccurence.csv');
    Route::get('/export/disabilityoccurencepdf', [ExportController::class, 'disabilityOccurenceExportPDF'])->name('exportDisabilityOccurence.pdf');
    Route::get('/export/disabilitytypecsv', [ExportController::class, 'disabilityTypeExportCSV'])->name('exportDisabilityType.csv');
    Route::get('/export/disabilitytypepdf', [ExportController::class, 'disabilityTypeExportPDF'])->name('exportDisabilityType.pdf');

    Route::get('/export/employmenttypecsv', [ExportController::class, 'employmentTypeExportCSV'])->name('exportEmploymentType.csv');
    Route::get('/export/employmenttypepdf', [ExportController::class, 'employmentTypeExportPDF'])->name('exportEmploymentType.pdf');
    Route::get('/export/agebinscsv', [ExportController::class, 'ageBinsExportCSV'])->name('exportageBins.csv');
    Route::get('/export/agebinspdf', [ExportController::class, 'ageBinsExportPDF'])->name('exportageBins.pdf');


    Route::get('/admin/userapplication/applicant/{id}', [AdminController::class, 'userapplication'])->name('admin.applicantinfo');
    Route::get('/admin/userpwdapplication/applicant/{id}', [AdminController::class, 'userpwdapplication'])->name('admin.pwdapplicantinfo');
    Route::get('/admin/employerapplication/employer/{id}', [AdminController::class, 'employerapplication'])->name('admin.employerapplicantinfo');


    Route::post('/admin/approveuser/{id}', [AdminController::class, 'approveuser'])->name('admin.approveuser');
});

Route::middleware(['auth', 'redirectIfNotCompleted', 'userMiddleware', 'preventAccessFromPendingApproval'])->group(function () {
    Route::get('/setup', [FormController::class, 'step1'])->name('setup');
    Route::post('/setup', [FormController::class, 'postStep1']);

    Route::get('/personal', [FormController::class, 'step2'])->name('personal');
    Route::post('/personal', [FormController::class, 'postStep2']);

    Route::get('/workexp', [FormController::class, 'step3'])->name('workexp');
    Route::post('/workexp', [FormController::class, 'postStep3']);

    Route::get('/jobpreferences', [FormController::class, 'step4'])->name('jobpreferences');
    Route::post('/jobpreferences', [FormController::class, 'postStep4']);

    Route::get('/dialect', [FormController::class, 'step5'])->name('dialect');
    Route::post('/dialect', [FormController::class, 'postStep5']);

    Route::get('/educationalbg', [FormController::class, 'step6'])->name('educationalbg');
    Route::post('/educationalbg', [FormController::class, 'postStep6']);

    Route::get('/pwdinfo', [FormController::class, 'step7'])->name('pwdinfo');
    Route::post('/pwdinfo', [FormController::class, 'postStep7']);

    //Route::get('/otherskills', [FormController::class, 'step8'])->name('otherskills');
    //Route::post('/otherskills', [FormController::class, 'postStep8']);

    // Route::get('/acceptterms', [FormController::class, 'step9'])->name('acceptterms');
    //  Route::post('/acceptterms', [FormController::class, 'postStep9']);

});


Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('pendingapproval', [UserController::class, 'waiting'])->name('pendingapproval');
    Route::post('pendingapproval', [FormController::class, 'startdata']);
});


Route::middleware(['auth', 'employerMiddleware'])->group(function () {
    Route::get('/employer/setup', [EmployerSetupController::class, 'create'])->name('employer.setup');
    Route::post('/employer/setup', [EmployerSetupController::class, 'store']);
});


Route::middleware(['auth', 'employerMiddleware', 'ensureEmployerSetupCompleted'])->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route::get('/employer/profile', [EmployerController::class, 'editprofile'])->name('employer.profile');
    Route::get('/employer/manage', [EmployerController::class, 'manage'])->name('employer.manage');
    Route::get('/employer/addjobs', [EmployerController::class, 'addjobs'])->name('employer.add');
    Route::get('/employer/reviewapplicants', [EmployerController::class, 'review'])->name('employer.review');

    Route::get('/employer/messages', [EmployerController::class, 'messages'])->name('employer.messages');
    Route::post('/employer/messages', [EmployerController::class, 'storeMessage'])->name('employer.messages.store');

    Route::get('/employer/applicantinformation/applicant/{id}', [EmployerController::class, 'applicantinformation'])->name('employer.applicantinfo');
    Route::get('/employer/applicantinformation/pwd/{id}', [EmployerController::class, 'pwdinformation'])->name('employer.pwdinfo');
    Route::get('/employer/editjobs/{id}', [EmployerController::class, 'editjobs'])->name('employer.edit');
    Route::post('/employer/applicantinformation/hire/{id}', [EmployerController::class, 'hire'])->name('hire.applicant');
    Route::post('/employer/replies', [EmployerController::class, 'storeReply'])->name('employer.replies.store');

    Route::get('/employer/messages/{id}/replies', [EmployerController::class, 'getReplies'])->name('employer.replies.retrieve');

    Route::post('/employer/addjobs', [JobInfoController::class, 'store'])->name('jobinfos.store');
    Route::put('/employer/editjobs/{id}', [JobInfoController::class, 'update'])->name('jobinfos.update');
    Route::put('/employer/profile/update', [JobInfoController::class, 'updateprofile'])->name('employer.updateprofile');
});



Route::middleware('auth')->group(function () {
    Route::post('/employer/profile/update-picture', [EmployerProfilePictureController::class, 'update'])->name('employer.updateprofpic');
});

Route::post('/toggle-dark-mode', [DarkModeController::class, 'toggleDarkMode'])->name('toggle-dark-mode');


