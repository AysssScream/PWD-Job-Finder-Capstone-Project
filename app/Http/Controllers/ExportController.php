<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Barryvdh\DomPDF\Facade\PDF; // Ensure this is correct
use App\Models\EducationalAttainment;
use App\Models\PwdInformation;
use App\Models\EmploymentInfo;
use App\Models\ApplicantProfile;
use Carbon\Carbon;

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
        return $pdf->stream('skills.pdf');
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
        return $pdf->stream('education_levels.pdf');
    }


    public function disabilityOccurenceExportCSV()
    {
        // Get all PWD information
        $pwdInformationData = PwdInformation::all();

        // Count occurrences of each disability occurrence
        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy()->sortDesc();

        // Prepare CSV content
        $csvContent = "Disability Occurrence,Count,Percentage\n"; // CSV header

        $totalDisabilityOccurrencesCount = $disabilityOccurrences->sum(); // Calculate the total count

        foreach ($disabilityOccurrences as $occurrence => $count) {
            $percentage = $totalDisabilityOccurrencesCount > 0 ? number_format(($count / $totalDisabilityOccurrencesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$occurrence\",$count,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'disability_occurrences.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }


    public function disabilityOccurenceExportPDF()
    {
        // Fetch all disability occurrences from the database
        $pwdInformationData = PwdInformation::all();

        // Count occurrences of each disability
        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy();

        // Prepare data for the view
        $data = [];
        foreach ($disabilityOccurrences as $disability => $count) {
            $data[] = [
                'Disability Occurrence' => $disability,
                'Count' => $count,
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Disability Occurrences Report</title>
    </head>
    <body>
        <h1 style="text-align: center;">Disability Occurrences Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Disability Occurrence</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Disability Occurrence']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Count']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = Pdf::loadHTML($html);
        // Output the generated PDF
        return $pdf->stream('disability_occurrences.pdf');
    }



    public function disabilityTypeExportCSV()
    {
        // Get all PWD information
        $pwdInformationData = PwdInformation::all();

        // Count occurrences of each disability type
        $disabilityTypes = $pwdInformationData->pluck('disability')->countBy()->sortDesc();
        // Prepare CSV content
        $csvContent = "Disability Type,Count,Percentage\n"; // CSV header

        $totalDisabilityTypesCount = $disabilityTypes->sum(); // Calculate the total count

        foreach ($disabilityTypes as $type => $count) {
            $percentage = $totalDisabilityTypesCount > 0 ? number_format(($count / $totalDisabilityTypesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$type\",$count,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'disability_types.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    public function disabilityTypeExportPDF()
    {
        // Get all PWD information
        $pwdInformationData = PwdInformation::all();

        // Count occurrences of each disability type
        $disabilityTypes = $pwdInformationData->pluck('disability')->countBy()->sortDesc();

        $totalDisabilityTypesCount = $disabilityTypes->sum(); // Calculate the total count

        // Prepare data for the PDF
        $data = [];
        foreach ($disabilityTypes as $type => $count) {
            $data[] = [
                'Disability Type' => $type,
                'Count' => $count,
                'Percentage' => $totalDisabilityTypesCount > 0 ? number_format(($count / $totalDisabilityTypesCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Disability Types Report</title>
    </head>
    <body>
        <h1 style="text-align: center;">Disability Types Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Disability Type</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Disability Type']) . '</td>
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
        return $pdf->stream('disability_types.pdf');
    }



    public function employmentTypeExportCSV()
    {
        // Fetch all employment information
        $employmentInfo = EmploymentInfo::all();

        // Count occurrences of each employment type
        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy()->sortDesc();

        // Prepare CSV content
        $csvContent = "Employment Type,Count,Percentage\n"; // CSV header

        $totalEmploymentTypesCount = $employmentTypes->sum(); // Calculate the total count

        foreach ($employmentTypes as $type => $count) {
            $percentage = $totalEmploymentTypesCount > 0 ? number_format(($count / $totalEmploymentTypesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$type\",$count,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'employment_types.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }


    public function employmentTypeExportPDF()
    {
        // Fetch all employment information
        $employmentInfo = EmploymentInfo::all();

        // Count occurrences of each employment type
        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy()->sortDesc();

        $totalEmploymentTypesCount = $employmentTypes->sum(); // Calculate the total count

        // Prepare data for the view
        $data = [];
        foreach ($employmentTypes as $type => $count) {
            $data[] = [
                'Employment Type' => $type,
                'Count' => $count,
                'Percentage' => $totalEmploymentTypesCount > 0 ? number_format(($count / $totalEmploymentTypesCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Employment Types Report</title>
    </head>
    <body>
        <h1 style="text-align: center;">Employment Types Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Employment Type</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Employment Type']) . '</td>
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
        return $pdf->stream('employment_types.pdf');
    }

    public function ageBinsExportCSV()
    {
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

        $totalCount = $ages->count();

        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        // Calculate percentage and sort by count descending
        $ageBinsData = $ageBinsCount->map(function ($count, $bin) use ($totalCount) {
            return [
                'bin' => $bin,
                'count' => $count,
                'percentage' => $totalCount > 0 ? ($count / $totalCount) * 100 : 0
            ];
        })->sortByDesc('count')->values();

        // Prepare CSV content
        $csvContent = "Age Bin,Count,Percentage\n"; // CSV header

        foreach ($ageBinsData as $data) {
            $csvContent .= "\"{$data['bin']}\",{$data['count']},{$data['percentage']}%\n"; // CSV rows
        }

        // Define filename
        $filename = 'age_bins.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    public function ageBinsExportPDF()
    {
        // Define age bins, starting from 16
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

        // Calculate ages and categorize them into bins, filtering out ages below 16
        $ages = $applicantProfiles->map(function ($profile) {
            $age = Carbon::parse($profile->birthdate)->age;
            return $age >= 16 ? $age : null;
        })->filter();

        // Count the number of applicants in each age bin
        $ageBinsCount = collect($ageBins)->map(function ($range, $bin) use ($ages) {
            return $ages->filter(function ($age) use ($range) {
                return $age >= $range[0] && $age <= $range[1];
            })->count();
        });

        // Sort bins by count from highest to lowest
        $sortedAgeBinsCount = $ageBinsCount->sortDesc();

        // Calculate the total number of valid age counts for percentage calculation
        $totalAgeCount = $sortedAgeBinsCount->sum();

        // Prepare data for the view with percentage
        $data = [];
        foreach ($sortedAgeBinsCount as $bin => $count) {
            $percentage = $totalAgeCount > 0 ? number_format(($count / $totalAgeCount) * 100, 1) . '%' : '0%';
            $data[] = [
                'Age Bin' => $bin,
                'Count' => $count,
                'Percentage' => $percentage,
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Age Bins Report</title>
    </head>
    <body>
        <h1 style="text-align: center;">Age Bins Report (16 and Above)</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Age Bin</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: right;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: right;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Age Bin']) . '</td>
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
        return $pdf->stream('age_bins.pdf');
    }



}
