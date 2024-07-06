<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DarkModeController extends Controller
{
    public function toggleDarkMode(Request $request)
    {
        // Retrieve dark mode preference from request
        $isDarkMode = $request->input('dark_mode', false);

        // Store dark mode preference in session (optional)
        session(['dark_mode' => $isDarkMode]);

        // You can also store the preference in the database if needed

        // Respond with a JSON response indicating success
        return response()->json(['message' => 'Dark mode toggled successfully']);
    }
}
