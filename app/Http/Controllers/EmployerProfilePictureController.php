<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;

class EmployerProfilePictureController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the authenticated user's employer record
        $employer = Employer::where('user_id', Auth::id())->firstOrFail();

        // Store the old picture path for potential deletion later
        $oldPicture = $employer->company_logo;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'company_logo/' . $fileName;

            // Move the uploaded file to public storage directory
            $file->move(public_path('storage/company_logo'), $fileName);

            // Update the employer's company_logo path in the database
            $employer->company_logo = $filePath;
            $employer->save();

            // Optionally, delete the old picture if it exists
            if ($oldPicture && file_exists(public_path('storage/' . $oldPicture))) {
                unlink(public_path('storage/' . $oldPicture));
            }
        }

        // Redirect back with success message
        return back()->with('success', 'Profile picture updated successfully.');
    }
}
