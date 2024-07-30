<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Barryvdh\DomPDF\Facade\PDF; // Ensure this is correct
use App\Models\EducationalAttainment;


class ExportController extends Controller
{
    public function skillsExportPDF()
    {
        // Get all work experiences
        $workExperiences = WorkExperience::all();

        // Flatten the skills and count occurrences
        $skills = $workExperiences->flatMap(function ($workExperience) {
            return array_map('trim', explode(',', $workExperience->skills));
        })->filter()
            ->countBy()
            ->sortDesc();

        // Prepare data for the PDF
        $data = [];
        foreach ($skills as $skill => $count) {
            $data[] = [
                'Skill' => $skill,
                'Employed' => $count,
            ];
        }

        // Define the HTML content for the PDF
        $htmlContent = '<!DOCTYPE html>
        <html>
        <head>
            <title>Skills Report</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>
        <body>
            <h1>Skills Report</h1>
            <table>
                <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data as $row) {
            $htmlContent .= '<tr>
                <td>' . htmlspecialchars($row['Skill']) . '</td>
                <td>' . htmlspecialchars($row['Employed']) . '</td>
            </tr>';
        }

        $htmlContent .= '</tbody>
            </table>
        </body>
        </html>';

        // Generate PDF from HTML content
        $pdf = PDF::loadHTML($htmlContent);

        // Return PDF download response
        return $pdf->download('skills.pdf');
    }

    public function educationExportCSV()
    {
        // Get all educational attainments
        $educationalAttainments = EducationalAttainment::all();

        // Aggregate education levels and count occurrences
        $educationLevels = $educationalAttainments->flatMap(function ($attainment) {
            return array_map('trim', explode(',', $attainment->educationLevel)); // Assuming educationLevel is a comma-separated string
        })->filter()
            ->countBy()
            ->sortDesc();

        // Prepare CSV content
        $csvContent = "Education Level,Count,Percentage\n"; // CSV header

        $totalEducationLevelsCount = $educationLevels->sum(); // Calculate the total count

        foreach ($educationLevels as $education => $count) {
            $percentage = $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$education\",$count,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'education_levels.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }


    public function educationExportPDF()
    {
        // Fetch all educational attainments from the database
        $educationalAttainments = EducationalAttainment::all();

        // Aggregate education levels and count occurrences
        $educationLevels = $educationalAttainments->flatMap(function ($attainment) {
            return array_map('trim', explode(',', $attainment->educationLevel));
        })->filter()
            ->countBy()
            ->sortDesc();

        $totalEducationLevelsCount = $educationLevels->sum(); // Calculate the total count

        // Prepare data for the view
        $data = [];
        foreach ($educationLevels as $education => $count) {
            $data[] = [
                'Education Level' => $education,
                'Count' => $count,
                'Percentage' => $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
        <html>
        <head>
            <title>Education Levels Report</title>
        </head>
        <body>
            <h1 style="text-align: center;">Education Levels Report</h1>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Education Level</th>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data as $row) {
            $html .= '
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Education Level']) . '</td>
                    <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Count']) . '</td>
                    <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
                </tr>';
        }

        $html .= '
                </tbody>
            </table>
        </body>
        </html>';

        // Generate PDF from the HTML content
        $pdf = Pdf::loadHTML($html);

        // Return the PDF as a download
        return $pdf->download('education_levels.pdf');
    }

}
