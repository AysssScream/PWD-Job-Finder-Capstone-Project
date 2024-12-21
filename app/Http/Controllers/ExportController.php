<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EducationalAttainment;
use App\Models\PwdInformation;
use App\Models\EmploymentInfo;
use App\Models\ApplicantProfile;
use Carbon\Carbon;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use App\Models\JobInfo;


class ExportController extends Controller
{
    public function certificationsExportCSV(Request $request)
    {
        // Retrieve and decode the certification data from the request
        $educationalCertificationNames = json_decode($request->input('educationalCertificationNames'), true);
        $educationalCertificationCounts = json_decode($request->input('educationalCertificationCounts'), true);
        $jobCertificationNames = json_decode($request->input('jobCertificationNames'), true);
        $jobCertificationCount = json_decode($request->input('jobCertificationCount'), true);
        $resumeCertificationNames = json_decode($request->input('resumeCertificationNames'), true);
        $resumeCertificationCount = json_decode($request->input('resumeCertificationCount'), true);

        // Prepare the data for CSV
        $csvData = [];

        // Educational Certifications
        foreach ($educationalCertificationNames as $index => $name) {
            $csvData[] = [
                'Type' => 'PWD Certifications (Via Registration)',
                'Certification Name' => $name,
                'Count' => $educationalCertificationCounts[$index],
            ];
        }

        // Job Certifications
        foreach ($jobCertificationNames as $index => $name) {
            $csvData[] = [
                'Type' => 'Job Requirement Certification',
                'Certification Name' => $name,
                'Count' => $jobCertificationCount[$index],
            ];
        }

        // Resume Certifications
        foreach ($resumeCertificationNames as $index => $name) {
            $csvData[] = [
                'Type' => 'Unmatched Job Certification (Via Resume)',
                'Certification Name' => $name,
                'Count' => $resumeCertificationCount[$index],
            ];
        }

        // Create a file pointer connected to the output stream
        $handle = fopen('php://output', 'w');

        // Set headers for the CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="certifications.csv"');

        // Add CSV header row
        fputcsv($handle, ['Type', 'Certification Name', 'Count']);

        // Output the data
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);
        exit; // Stop execution after sending the file
    }


    public function certificationsExportPDF(Request $request)
    {
        // Retrieve and decode the certification data from the request
        $educationalCertificationNames = json_decode($request->input('educationalCertificationNames'), true);
        $educationalCertificationCounts = json_decode($request->input('educationalCertificationCounts'), true);
        $jobCertificationNames = json_decode($request->input('jobCertificationNames'), true);
        $jobCertificationCount = json_decode($request->input('jobCertificationCount'), true);
        $resumeCertificationNames = json_decode($request->input('resumeCertificationNames'), true);
        $resumeCertificationCount = json_decode($request->input('resumeCertificationCount'), true);

        // Prepare data for the PDF
        $data = [];

        // Educational Certifications
        $totalEducationalCount = array_sum($educationalCertificationCounts);
        $educationalData = [];
        foreach ($educationalCertificationCounts as $index => $count) {
            $educationalData[] = [
                'Certification Name' => $educationalCertificationNames[$index],
                'Count' => $count,
                'Percentage' => $totalEducationalCount > 0 ? number_format(($count / $totalEducationalCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Job Certifications
        $totalJobCertificationCount = array_sum($jobCertificationCount);
        $jobData = [];
        foreach ($jobCertificationCount as $index => $count) {
            $jobData[] = [
                'Certification Name' => $jobCertificationNames[$index],
                'Count' => $count,
                'Percentage' => $totalJobCertificationCount > 0 ? number_format(($count / $totalJobCertificationCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Resume Certifications
        $totalResumeCertificationCount = array_sum($resumeCertificationCount);
        $resumeData = [];
        foreach ($resumeCertificationCount as $index => $count) {
            $resumeData[] = [
                'Certification Name' => $resumeCertificationNames[$index],
                'Count' => $count,
                'Percentage' => $totalResumeCertificationCount > 0 ? number_format(($count / $totalResumeCertificationCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '<!DOCTYPE html>
    <html>
       <head>
        <title>Certifications Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1 {
                text-align: center;
            }
            h2 {
                margin-top: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 20px; /* Space between tables */
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000; /* Optional for visual separation */
            }
            .w-one-third {
                width: 33.33%; /* Each cell takes one-third of the table width */
                text-align: center; /* Center images horizontally within each cell */
            }
            .image-style {
                width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none; /* Remove default borders */
                margin: 10px 0; /* Space above and below the line */
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px; 
                font-family: Times New Roman;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p style="">CITY OF MANDALUYONG</p>
                        <p style="">OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
                </td>
            </tr>
        </table>
        <hr class="line">
        <h1>Certifications Report</h1>
        ';

        // Educational Certifications Table
        $html .= '<h2>Top PWD Certifications</h2>
              <h3>via registration form </h3>
              <table>
                  <thead>
                      <tr>
                          <th>Certification Name</th>
                          <th>Count</th>
                          <th>Percentage</th>
                      </tr>
                  </thead>
                  <tbody>';

        foreach ($educationalData as $row) {
            $html .= '
        <tr>
            <td>' . htmlspecialchars($row['Certification Name']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Count']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Percentage']) . '</td>
        </tr>';
        }

        $html .= '
                  </tbody>
              </table>';

        // Job Certifications Table
        $html .= '<br><br>
    <h2>Top Job Certifications</h2>
              <table>
                  <thead>
                      <tr>
                          <th>Certification Name</th>
                          <th>Count</th>
                          <th>Percentage</th>
                      </tr>
                  </thead>
                  <tbody>';

        foreach ($jobData as $row) {
            $html .= '
        <tr>
            <td>' . htmlspecialchars($row['Certification Name']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Count']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Percentage']) . '</td>
        </tr>';
        }

        $html .= '
                  </tbody>
              </table>';

        // Resume Certifications Table
        $html .= '<br><br>
    <h2>Unmatched Job Certifications</h2>
              <table>
                  <thead>
                      <tr>
                          <th>Certification Name</th>
                          <th>Count</th>
                          <th>Percentage</th>
                      </tr>
                  </thead>
                  <tbody>';

        foreach ($resumeData as $row) {
            $html .= '
        <tr>
            <td>' . htmlspecialchars($row['Certification Name']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Count']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($row['Percentage']) . '</td>
        </tr>';
        }

        $html .= '
                  </tbody>
              </table>';

        $html .= '
            </body>
            </html>';

        // Generate PDF from HTML content
        $pdf = PDF::loadHTML($html);

        // Return PDF download response
        return $pdf->stream('certifications.pdf');
    }




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
        $totalSkillsCount = $skills->sum(); // Calculate the total count

        $data = [];
        foreach ($skills as $skill => $count) {
            $data[] = [
                'Skill' => $skill,
                'Count' => $count,
                'Percentage' => $totalSkillsCount > 0 ? number_format(($count / $totalSkillsCount) * 100, 1) . '%' : '0%',
            ];
        }



        // Define the HTML content for the PDF
        $html = '<!DOCTYPE html>
        <html>
           <head>
        <title>Disability Occurrences Report</title>
        <style>

         body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, sans-serif;
        }
        h4 {
          margin: 0;
        }
        .w-full {
            width: 100%;
            border-bottom: 1px solid #000; /* Optional for visual separation */

        }
       .w-one-third {
            width: 33.33%; /* Each cell takes one-third of the table width */
            text-align: center; /* Center images horizontally within each cell */
        }
        .image-style {
              width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
         }
        .line {
            width: 100%;
            border: none; /* Remove default borders */
            border-top: 1px solid #000; /* Line color and style */
            margin: 10px 0; /* Space above and below the line */
        }
            .text p {
            margin: 1;
            padding: 0;
            font-size: 14px; 
            font-family: Times New Roman;

        }

          th {
         background-color: #f2f2f2;
         }

        .results{
            font-family: Times New Roman;

            
         }
            
    </style>
    </head>
        <body>
            <table class="w-full " >
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text" >
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">

        </tr>

    </table>

        <h1 style="text-align: center;">Skills Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Skills</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Skill']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>

            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        // Generate PDF from HTML content
        $pdf = PDF::loadHTML($html);

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
        <title>Education Level Report</title>
        <style>

         body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, sans-serif;
        }
        h4 {
          margin: 0;
        }
        .w-full {
            width: 100%;
            border-bottom: 1px solid #000; /* Optional for visual separation */

        }
       .w-one-third {
            width: 33.33%; /* Each cell takes one-third of the table width */
            text-align: center; /* Center images horizontally within each cell */
        }
        .image-style {
              width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
         }
        .line {
            width: 100%;
            border: none; /* Remove default borders */
            border-top: 1px solid #000; /* Line color and style */
            margin: 10px 0; /* Space above and below the line */
        }
            .text p {
            margin: 1;
            padding: 0;
            font-size: 14px; 
            font-family: Times New Roman;

        }
        th {
         background-color: #f2f2f2;
         }
        .results{
            font-family: Times New Roman;

            
         }
            
    </style>
    </head>
         <table class="w-full " >
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text" >
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">

        </tr>

    </table>

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

        // Count occurrences of each other disability detail
        $otherDisabilityDetailsOccurrences = $pwdInformationData->pluck('otherDisabilityDetails')->countBy()->sortDesc();

        // Prepare CSV content
        $csvContent = "Disability Occurrence,Count,Percentage\n"; // CSV header for Disability Occurrences

        $totalDisabilityOccurrencesCount = $disabilityOccurrences->sum(); // Calculate the total count for Disability Occurrences

        // Add Disability Occurrences data to CSV
        foreach ($disabilityOccurrences as $occurrence => $count) {
            $percentage = $totalDisabilityOccurrencesCount > 0 ? number_format(($count / $totalDisabilityOccurrencesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$occurrence\",$count,$percentage\n"; // CSV rows
        }

        // Check if there are other disability details to add
        if ($otherDisabilityDetailsOccurrences->isNotEmpty()) {
            $csvContent .= "\nOther Disability Details,Count,Percentage\n"; // CSV header for Other Disability Details

            $totalOtherDisabilityDetailsCount = $otherDisabilityDetailsOccurrences->sum(); // Calculate the total count for Other Disability Details

            // Add Other Disability Details data to CSV
            foreach ($otherDisabilityDetailsOccurrences as $detail => $count) {
                if (!empty($detail)) { // Only include rows with non-empty details
                    $percentage = $totalOtherDisabilityDetailsCount > 0 ? number_format(($count / $totalOtherDisabilityDetailsCount) * 100, 1) . '%' : '0%';
                    $csvContent .= "\"$detail\",$count,$percentage\n"; // CSV rows
                }
            }
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
        // Fetch all disability occurrences and other disability details from the database
        $pwdInformationData = PwdInformation::all();

        // Count occurrences of each disability
        $disabilityOccurrences = $pwdInformationData->pluck('disabilityOccurrence')->countBy();
        $totalDisabilityOccurrencesCount = $disabilityOccurrences->sum(); // Calculate the total count

        // Count occurrences of each otherDisabilityDetails
        $otherDisabilityDetailsOccurrences = $pwdInformationData->pluck('otherDisabilityDetails')->countBy();
        $totalOtherDisabilityDetailsCount = $otherDisabilityDetailsOccurrences->sum(); // Calculate the total count

        // Prepare data for the disability occurrences table
        $data = [];
        foreach ($disabilityOccurrences as $disability => $count) {
            $data[] = [
                'Disability Occurrence' => $disability,
                'Count' => $count,
                'Percentage' => $totalDisabilityOccurrencesCount > 0 ? number_format(($count / $totalDisabilityOccurrencesCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Prepare data for the other disability details table
        $otherData = [];
        foreach ($otherDisabilityDetailsOccurrences as $detail => $count) {
            if ($detail) { // Only add rows if the detail is not empty
                $otherData[] = [
                    'Other Disability Details' => $detail,
                    'Count' => $count,
                    'Percentage' => $totalOtherDisabilityDetailsCount > 0 ? number_format(($count / $totalOtherDisabilityDetailsCount) * 100, 1) . '%' : '0%',
                ];
            }
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Disability Occurrences Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h4 {
                margin: 0;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px; 
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                
                <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
                <hr class="line">
            </tr>
        </table>

        <h1 style="text-align: center;">Disability Occurrences Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Disability Occurrence</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Disability Occurrence']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>';

        // Check if otherData is not empty before adding the table
        if (!empty($otherData)) {
            $html .= '
        <h1 style="text-align: center; margin-top: 100px;"> Other Disability Occurrences Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Other Disability Details</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

            foreach ($otherData as $row) {
                $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Other Disability Details']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
            }

            $html .= '
            </tbody>
        </table>';
        }

        $html .= '
    </body>
    </html>';

        // Generate the PDF
        $pdf = Pdf::loadHTML($html);

        // Output the generated PDF
        return $pdf->stream('disability_occurrences.pdf');
    }


    public function disabilityTypeExportCSV()
    {
        $pwdInformationData = PwdInformation::all();

        $disabilityTypes = $pwdInformationData->pluck('disability')->countBy()->sortDesc();
        $totalDisabilityTypesCount = $disabilityTypes->sum(); // Calculate the total count

        $csvContent = "Disability Type,Count,Percentage\n"; // CSV header

        foreach ($disabilityTypes as $type => $count) {
            $percentage = $totalDisabilityTypesCount > 0 ? number_format(($count / $totalDisabilityTypesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$type\",$count,$percentage\n"; // CSV rows
        }

        $csvContent .= "\n"; // Optional: Add space between two tables

        $disabilityDetailsCount = $pwdInformationData->pluck('disabilityDetails')->countBy()->sortDesc();
        $totalDisabilityDetailsCount = $disabilityDetailsCount->sum(); // Calculate the total count of disability details

        $csvContent .= "Disability Detail,Count,Percentage\n"; // Header for the new table

        foreach ($disabilityDetailsCount as $detail => $count) {
            $percentage = $totalDisabilityDetailsCount > 0 ? number_format(($count / $totalDisabilityDetailsCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$detail\",$count,$percentage\n"; // CSV rows for disability details
        }

        $filename = 'disability_types.csv';

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    public function disabilityTypeExportPDF()
    {
        $pwdInformationData = PwdInformation::all();

        $disabilityTypes = $pwdInformationData->pluck('disability')->countBy()->sortDesc();

        $totalDisabilityTypesCount = $disabilityTypes->sum(); // Calculate the total count

        $data = [];
        foreach ($disabilityTypes as $type => $count) {
            // Fetch the corresponding disability details for each type

            $data[] = [
                'Disability Type' => $type,
                'Count' => $count,
                'Percentage' => $totalDisabilityTypesCount > 0 ? number_format(($count / $totalDisabilityTypesCount) * 100, 1) . '%' : '0%',
            ];
        }

        $disabilityDetailsCount = $pwdInformationData->pluck('disabilityDetails')->countBy()->sortDesc();
        $totalDisabilityDetailsCount = $disabilityDetailsCount->sum(); // Calculate the total count of disability details

        $detailsData = [];
        foreach ($disabilityDetailsCount as $detail => $count) {
            $detailsData[] = [
                'Disability Detail' => $detail,
                'Count' => $count,
                'Percentage' => $totalDisabilityDetailsCount > 0 ? number_format(($count / $totalDisabilityDetailsCount) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Disability Types Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h4 {
                margin: 0;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000; /* Optional for visual separation */
            }
            .w-one-third {
                width: 33.33%; /* Each cell takes one-third of the table width */
                text-align: center; /* Center images horizontally within each cell */
            }
            .image-style {
                width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none; /* Remove default borders */
                border-top: 1px solid #000; /* Line color and style */
                margin: 10px 0; /* Space above and below the line */
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px; 
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                
                <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
                <hr class="line">
            </tr>
        </table>

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

        <h1 style="text-align: center; margin-top:100px;">Disability Details Breakdown</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Disability Detail</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($detailsData as $detailRow) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($detailRow['Disability Detail']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($detailRow['Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($detailRow['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = Pdf::loadHTML($html);

        return $pdf->stream('disability_types.pdf');
    }

    public function employmentTypeExportCSV()
    {
        $employmentInfo = EmploymentInfo::all();

        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy()->sortDesc();

        $csvContent = "Employment Type,Count,Percentage\n"; // CSV header

        $totalEmploymentTypesCount = $employmentTypes->sum(); // Calculate the total count

        foreach ($employmentTypes as $type => $count) {
            $percentage = $totalEmploymentTypesCount > 0 ? number_format(($count / $totalEmploymentTypesCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$type\",$count,$percentage\n"; // CSV rows
        }

        $filename = 'employment_types.csv';

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }


    public function employmentTypeExportPDF()
    {
        $employmentInfo = EmploymentInfo::all();

        $employmentTypes = $employmentInfo->pluck('employment_type')->countBy()->sortDesc();

        $totalEmploymentTypesCount = $employmentTypes->sum(); // Calculate the total count

        $data = [];
        foreach ($employmentTypes as $type => $count) {
            $data[] = [
                'Employment Type' => $type,
                'Count' => $count,
                'Percentage' => $totalEmploymentTypesCount > 0 ? number_format(($count / $totalEmploymentTypesCount) * 100, 1) . '%' : '0%',
            ];
        }

        $html = '
    <html>
   <head>
        <title>Disability Occurrences Report</title>
        <style>

         body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, sans-serif;
        }
        h4 {
          margin: 0;
        }
        .w-full {
            width: 100%;
            border-bottom: 1px solid #000; /* Optional for visual separation */

        }
       .w-one-third {
            width: 33.33%; /* Each cell takes one-third of the table width */
            text-align: center; /* Center images horizontally within each cell */
        }
        .image-style {
              width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
         }
        .line {
            width: 100%;
            border: none; /* Remove default borders */
            border-top: 1px solid #000; /* Line color and style */
            margin: 10px 0; /* Space above and below the line */
        }
            .text p {
            margin: 1;
            padding: 0;
            font-size: 14px; 
            font-family: Times New Roman;

        }

          th {
         background-color: #f2f2f2;
         }

        .results{
            font-family: Times New Roman;

            
         }
            
    </style>
    </head>
    <body>
       <table class="w-full " >
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text" >
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">

        </tr>

    </table>
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
        <style>

         body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, sans-serif;
        }
        h4 {
          margin: 0;
        }
        .w-full {
            width: 100%;
            border-bottom: 1px solid #000; /* Optional for visual separation */

        }
       .w-one-third {
            width: 33.33%; /* Each cell takes one-third of the table width */
            text-align: center; /* Center images horizontally within each cell */
        }
        .image-style {
              width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
         }
        .line {
            width: 100%;
            border: none; /* Remove default borders */
            border-top: 1px solid #000; /* Line color and style */
            margin: 10px 0; /* Space above and below the line */
        }
            .text p {
            margin: 1;
            padding: 0;
            font-size: 14px; 
            font-family: Times New Roman;

        }

          th {
         background-color: #f2f2f2;
         }

        .results{
            font-family: Times New Roman;

            
         }
            
    </style>
    </head>
    <body>
       <table class="w-full " >
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text" >
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">

        </tr>

    </table>


         <h1 style="text-align: center;">Age Bins Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Age Bins</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
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

    public function companiesExportPDF()
    {
        // Fetch all work experience data
        $workExperience = WorkExperience::all();

        // Count occurrences of each employer
        $employerCounts = $workExperience->groupBy('employer_name')->map(function ($experience) {
            return $experience->count(); // Count how many times each employer appears
        });

        // Sort employers by count from highest to lowest
        $sortedEmployerCounts = $employerCounts->sortDesc();

        // Calculate the total number of work experiences for percentage calculation
        $totalWorkExperienceCount = $sortedEmployerCounts->sum();

        // Prepare data for the view with percentage
        $data = [];
        foreach ($sortedEmployerCounts as $employer => $count) {
            $percentage = $totalWorkExperienceCount > 0 ? number_format(($count / $totalWorkExperienceCount) * 100, 1) . '%' : '0%';
            $data[] = [
                'Employer' => $employer,
                'Count' => $count,
                'Percentage' => $percentage,
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Work Experience Report</title>
        <style>
         body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, sans-serif;
        }
        h1, h4 {
          margin: 0;
            margin-top: 20px; /* Adjust the top margin as needed */
        }
        
        

        .w-full {
            width: 100%;
            border-bottom: 1px solid #000; /* Optional for visual separation */
        }
       .w-one-third {
            width: 33.33%; /* Each cell takes one-third of the table width */
            text-align: center; /* Center images horizontally within each cell */
        }
        .image-style {
              width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
         }
        .line {
            width: 100%;
            border: none; /* Remove default borders */
            border-top: 1px solid #000; /* Line color and style */
            margin: 10px 0; /* Space above and below the line */
        }
            .text p {
            margin: 1;
            padding: 0;
            font-size: 14px; 
            font-family: Times New Roman;
        }
         th {
         background-color: #f2f2f2;
         }

        .results {
            font-family: Times New Roman;
         }
            
    </style>
    </head>
    <body>
       <table class="w-full">
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text">
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">
        </tr>
    </table>
    <h1 style="text-align: center;">Employers Count Report</h1>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Employer</th>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Count</th>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $html .= '
        <tr>
            <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Employer']) . '</td>
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
        return $pdf->stream('work_experience.pdf');
    }


    public function companiesExportCSV()
    {
        // Fetch all work experience data
        $workExperience = WorkExperience::all();

        // Count occurrences of each employer
        $employerCounts = $workExperience->groupBy('employer_name')->map(function ($experience) {
            return $experience->count(); // Count how many times each employer appears
        })->sortDesc();

        // Prepare CSV content
        $csvContent = "Employer,Count,Percentage\n"; // CSV header

        $totalWorkExperienceCount = $employerCounts->sum(); // Calculate the total count

        foreach ($employerCounts as $employer => $count) {
            $percentage = $totalWorkExperienceCount > 0 ? number_format(($count / $totalWorkExperienceCount) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$employer\",$count,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'work_experience.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    public function yearsofExperienceExportPDF()
    {
        // Fetch all work experiences
        $workExperience = WorkExperience::all();

        // Calculate the number of years for each work experience
        $workExperience = $workExperience->map(function ($experience) {
            $fromDate = Carbon::parse($experience->from_date);
            $toDate = Carbon::parse($experience->to_date);
            $years = $fromDate->diffInYears($toDate);
            return $experience->setAttribute('years', $years);
        });

        // Group by employer name and calculate total years for each employer
        $employerYears = $workExperience->groupBy('employer_name')->map(function ($experiences) {
            return $experiences->sum('years'); // Sum up the years for each employer
        });

        // Sort employers by total years in descending order
        $sortedEmployerYears = $employerYears->sortDesc();

        // Calculate the total years of all work experiences
        $totalYears = $sortedEmployerYears->sum();

        // Round the total years to two decimal places
        $roundedTotalYears = number_format($totalYears, 2); // Format total years to two decimal places

        // Prepare the data for the view with concatenated years and months, and percentage
        $data = [];
        foreach ($sortedEmployerYears as $employer => $years) {
            // Round the individual years to two decimal places
            $roundedYears = floor($years); // Get whole years
            $decimalPart = $years - $roundedYears; // Get decimal part
            $months = round($decimalPart * 12); // Convert decimal part to months

            // Create a string for years and months
            $yearsMonthsString = $roundedYears . ' years ' . $months . ' months'; // Format as "X years Y months"

            // Calculate the percentage based on total years
            $percentage = $totalYears > 0 ? number_format(($years / $totalYears) * 100, 1) . '%' : '0%';

            $data[] = [
                'Employer' => $employer,
                'Years' => $yearsMonthsString, // Use the concatenated years and months string
                'Percentage' => $percentage,
            ];
        }
        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Work Experience Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px; /* Adjust the top margin as needed */
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000; /* Optional for visual separation */
            }
            .w-one-third {
                width: 33.33%; /* Each cell takes one-third of the table width */
                text-align: center; /* Center images horizontally within each cell */
            }
            .image-style {
                width: 70px; /* Set image width to 70px */
                height: auto; /* Maintain aspect ratio */
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none; /* Remove default borders */
                border-top: 1px solid #000; /* Line color and style */
                margin: 10px 0; /* Space above and below the line */
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th{
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            .text-center {
                text-align: center;
            }
        </style>
    </head>
    <body>
       <table class="w-full">
        <tr>
             <td class="w-one-third">
            <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;"> 
            </td>
            <td class="w-one-third">
            <div class="text">
            <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
            <p style="">CITY OF MANDALUYONG</p>
            <p style="">OFFICE OF THE MAYOR</p>
            <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
            </td>
            
            <td class="w-one-third">
            <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;"> 
            </td>
            
            <td class="w-one-third">
                <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;"> 
            </td>
            <hr class="line">
        </tr>
       </table>
        <h1 style="text-align: center;">Years of Experience Report</h1>
        <table>
            <thead>
                <tr>
                    <th>Employer</th>
                    <th>Total Years Employees Worked</th>
                    <th>Percentage of Total Work Experience</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                 <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Employer']) . '</td>
                    <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Years']) . '</td>
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
        return $pdf->stream('years_of_experience_report.pdf');
    }


    public function yearsofExperienceExportCSV()
    {
        // Fetch all work experiences
        $workExperience = WorkExperience::all();

        // Calculate the number of years for each work experience
        $workExperience = $workExperience->map(function ($experience) {
            $fromDate = Carbon::parse($experience->from_date);
            $toDate = Carbon::parse($experience->to_date);
            $years = $fromDate->diffInYears($toDate);
            return $experience->setAttribute('years', $years);
        });

        // Group by employer name and calculate total years for each employer
        $employerYears = $workExperience->groupBy('employer_name')->map(function ($experiences) {
            return $experiences->sum('years');
        });

        // Sort employers by total years in descending order
        $sortedEmployerYears = $employerYears->sortDesc();

        // Calculate the total years of all work experiences
        $totalYears = $sortedEmployerYears->sum();

        // Prepare CSV content
        $csvContent = "Employer Name,Total Years Employees Worked,Percentage of Total Work Experience\n"; // CSV header

        foreach ($sortedEmployerYears as $employer => $years) {
            $percentage = $totalYears > 0 ? number_format(($years / $totalYears) * 100, 1) . '%' : '0%';
            $csvContent .= "\"$employer\",$years,$percentage\n"; // CSV rows
        }

        // Define filename
        $filename = 'work_experience_report.csv';

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    public function hiringCompaniesExportCSV()
    {
        // Get hiring companies data with decrypted company names
        $hiringCompanies = JobApplication::where('status_plain', 'hired')
            ->get()
            ->groupBy('company_name') // Group by decrypted company name
            ->map(function ($group) {
                return [
                    'company_name' => $group->first()->company_name,
                    'hired_count' => $group->count()
                ];
            })
            ->sortByDesc('hired_count')
            ->values();

        $totalHires = JobApplication::where('status_plain', 'hired')->count();

        // Prepare CSV content
        $csvContent = "Company Name,Hired Count,Percentage\n";

        foreach ($hiringCompanies as $company) {
            $percentage = $totalHires > 0 ?
                number_format(($company['hired_count'] / $totalHires) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$company['company_name']}\",{$company['hired_count']},{$percentage}\n";
        }

        // Return CSV response
        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="hiring_companies.csv"');
    }

    public function hiringCompaniesExportPDF()
    {
        // Get hiring companies data with decrypted company names
        $hiringCompanies = JobApplication::where('status_plain', 'hired')
            ->get()
            ->groupBy('company_name') // Group by decrypted company name
            ->map(function ($group) {
                return [
                    'company_name' => $group->first()->company_name,
                    'hired_count' => $group->count()
                ];
            })
            ->sortByDesc('hired_count')
            ->values();

        $totalHires = JobApplication::where('status_plain', 'hired')->count();

        // Prepare data for the view
        $data = [];
        foreach ($hiringCompanies as $company) {
            $data[] = [
                'Company Name' => $company['company_name'],
                'Hired Count' => $company['hired_count'],
                'Percentage' => $totalHires > 0 ?
                    number_format(($company['hired_count'] / $totalHires) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Hiring Companies Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Hiring Companies Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Company Name</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Hired Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Company Name']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Hired Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        // Generate PDF from the HTML content
        $pdf = PDF::loadHTML($html);

        // Return the PDF as a download
        return $pdf->stream('hiring_companies.pdf');
    }

    public function companiesVacanciesExportPDF()
    {
        // Get all job info and handle grouping
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

        $totalVacancies = JobInfo::sum('vacancy');

        // Prepare data for the view
        $data = [];
        foreach ($companiesWithVacancies as $company) {
            $data[] = [
                'Company Name' => $company['company_name'],
                'Total Vacancies' => $company['total_vacancies'],
                'Percentage' => $totalVacancies > 0 ?
                    number_format(($company['total_vacancies'] / $totalVacancies) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Companies Vacancies Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Companies Vacancies Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Company Name</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Total Vacancies</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Company Name']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Total Vacancies']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        // Generate PDF from the HTML content
        $pdf = PDF::loadHTML($html);

        // Return the PDF as a download
        return $pdf->stream('companies_vacancies.pdf');
    }

    public function companiesVacanciesExportCSV()
    {
        // Get all job info and handle grouping
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

        $totalVacancies = JobInfo::sum('vacancy');

        // Prepare CSV content
        $csvContent = "Company Name,Total Vacancies,Percentage\n";

        foreach ($companiesWithVacancies as $company) {
            $percentage = $totalVacancies > 0 ?
                number_format(($company['total_vacancies'] / $totalVacancies) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$company['company_name']}\",{$company['total_vacancies']},{$percentage}\n";
        }

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="companies_vacancies.csv"');
    }

    public function jobPostingCompaniesExportPDF()
    {
        $jobPostingCompanies = JobInfo::select('company_name', DB::raw('COUNT(*) as job_count'))
            ->groupBy('company_name')
            ->orderBy('job_count', 'desc')
            ->get();

        $totalJobPosts = JobInfo::count();

        // Prepare data for the view
        $data = [];
        foreach ($jobPostingCompanies as $company) {
            $data[] = [
                'Company Name' => $company->company_name,
                'Job Posts' => $company->job_count,
                'Percentage' => $totalJobPosts > 0 ?
                    number_format(($company->job_count / $totalJobPosts) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Job Posting Companies Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Job Posting Companies Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Company Name</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Job Posts</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Company Name']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Job Posts']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = PDF::loadHTML($html);
        return $pdf->stream('job_posting_companies.pdf');
    }

    public function jobPostingCompaniesExportCSV()
    {
        $jobPostingCompanies = JobInfo::select('company_name', DB::raw('COUNT(*) as job_count'))
            ->groupBy('company_name')
            ->orderBy('job_count', 'desc')
            ->get();

        $totalJobPosts = JobInfo::count();

        // Prepare CSV content
        $csvContent = "Company Name,Job Posts,Percentage\n";

        foreach ($jobPostingCompanies as $company) {
            $percentage = $totalJobPosts > 0 ?
                number_format(($company->job_count / $totalJobPosts) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$company->company_name}\",{$company->job_count},{$percentage}\n";
        }

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="job_posting_companies.csv"');
    }

    public function appliedJobsExportPDF()
    {
        $appliedJobs = JobApplication::select('title', DB::raw('COUNT(*) as application_count'))
            ->groupBy('title')
            ->orderBy('application_count', 'desc')
            ->get()
            ->map(function ($job) {
                return [
                    'title' => $job->title,
                    'application_count' => $job->application_count
                ];
            });

        $totalApplications = JobApplication::count();

        // Prepare data for the view
        $data = [];
        foreach ($appliedJobs as $job) {
            $data[] = [
                'Job Title' => $job['title'],
                'Applications' => $job['application_count'],
                'Percentage' => $totalApplications > 0 ?
                    number_format(($job['application_count'] / $totalApplications) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Most Applied Jobs Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Most Applied Jobs Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Job Title</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Applications</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Job Title']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Applications']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = PDF::loadHTML($html);
        return $pdf->stream('most_applied_jobs.pdf');
    }

    public function appliedJobsExportCSV()
    {
        $appliedJobs = JobApplication::select('title', DB::raw('COUNT(*) as application_count'))
            ->groupBy('title')
            ->orderBy('application_count', 'desc')
            ->get()
            ->map(function ($job) {
                return [
                    'title' => $job->title,
                    'application_count' => $job->application_count
                ];
            });

        $totalApplications = JobApplication::count();

        // Prepare CSV content
        $csvContent = "Job Title,Applications,Percentage\n";

        foreach ($appliedJobs as $job) {
            $percentage = $totalApplications > 0 ?
                number_format(($job['application_count'] / $totalApplications) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$job['title']}\",{$job['application_count']},{$percentage}\n";
        }

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="most_applied_jobs.csv"');
    }

    public function hiredPositionsExportPDF()
    {
        $hiredPositions = JobApplication::where('status_plain', 'hired')
            ->select('title', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('title')
            ->orderBy('hired_count', 'desc')
            ->get()
            ->map(function ($position) {
                return [
                    'title' => $position->title,
                    'hired_count' => $position->hired_count
                ];
            });

        $totalPositionHires = JobApplication::where('status_plain', 'hired')->count();

        // Prepare data for the view
        $data = [];
        foreach ($hiredPositions as $position) {
            $data[] = [
                'Job Title' => $position['title'],
                'Hired Count' => $position['hired_count'],
                'Percentage' => $totalPositionHires > 0 ?
                    number_format(($position['hired_count'] / $totalPositionHires) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Most Hired Positions Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Most Hired Positions Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Job Title</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Hired Count</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Job Title']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Hired Count']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = PDF::loadHTML($html);
        return $pdf->stream('most_hired_positions.pdf');
    }

    public function hiredPositionsExportCSV()
    {
        $hiredPositions = JobApplication::where('status_plain', 'hired')
            ->select('title', DB::raw('COUNT(*) as hired_count'))
            ->groupBy('title')
            ->orderBy('hired_count', 'desc')
            ->get()
            ->map(function ($position) {
                return [
                    'title' => $position->title,
                    'hired_count' => $position->hired_count
                ];
            });

        $totalPositionHires = JobApplication::where('status_plain', 'hired')->count();

        // Prepare CSV content
        $csvContent = "Job Title,Hired Count,Percentage\n";

        foreach ($hiredPositions as $position) {
            $percentage = $totalPositionHires > 0 ?
                number_format(($position['hired_count'] / $totalPositionHires) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$position['title']}\",{$position['hired_count']},{$percentage}\n";
        }

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="most_hired_positions.csv"');
    }

    public function vacantJobsExportPDF()
    {
        $vacantJobs = JobInfo::select('title', 'company_name', 'vacancy')
            ->orderBy('vacancy', 'desc')
            ->get();

        $totalVacancies = JobInfo::sum('vacancy');

        // Prepare data for the view
        $data = [];
        foreach ($vacantJobs as $job) {
            $data[] = [
                'Job Title' => $job->title,
                'Company' => $job->company_name,
                'Vacancies' => $job->vacancy,
                'Percentage' => $totalVacancies > 0 ?
                    number_format(($job->vacancy / $totalVacancies) * 100, 1) . '%' : '0%',
            ];
        }

        // Define the HTML content for the PDF
        $html = '
    <html>
    <head>
        <title>Jobs with Most Vacancies Report</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Helvetica, sans-serif;
            }
            h1, h4 {
                margin: 0;
                margin-top: 20px;
            }
            .w-full {
                width: 100%;
                border-bottom: 1px solid #000;
            }
            .w-one-third {
                width: 33.33%;
                text-align: center;
            }
            .image-style {
                width: 70px;
                height: auto;
                margin-bottom: 10%;
            }
            .line {
                width: 100%;
                border: none;
                border-top: 1px solid #000;
                margin: 10px 0;
            }
            .text p {
                margin: 1;
                padding: 0;
                font-size: 14px;
                font-family: Times New Roman;
            }
            th {
                background-color: #f2f2f2;
            }
            .results {
                font-family: Times New Roman;
            }
        </style>
    </head>
    <body>
        <table class="w-full">
            <tr>
                <td class="w-one-third">
                    <img src="' . public_path('images/bagongpilipinas.jpg') . '" alt="Image 1" class="image-style" style="margin-right: 70%;">
                </td>
                <td class="w-one-third">
                    <div class="text">
                        <p style="font-weight: bold;">REPUBLIKA NG PILIPINAS</p>
                        <p>CITY OF MANDALUYONG</p>
                        <p>OFFICE OF THE MAYOR</p>
                        <p style="white-space: nowrap;">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
                    </div>
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/PDAD.jpg') . '" alt="Image 2" class="image-style" style="margin-left: 70%;">
                </td>
                <td class="w-one-third">
                    <img src="' . public_path('images/cityofmandalogo.jpg') . '" alt="Image 3" class="image-style" style="margin-left: 70%;">
                </td>
            </tr>
        </table>
        <hr class="line">

        <h1 style="text-align: center;">Jobs with Most Vacancies Report</h1>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Job Title</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Company</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Vacancies</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: left;">Percentage</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Job Title']) . '</td>
                <td style="border: 1px solid #000; padding: 8px;">' . htmlspecialchars($row['Company']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Vacancies']) . '</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: right;">' . htmlspecialchars($row['Percentage']) . '</td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
    </body>
    </html>';

        $pdf = PDF::loadHTML($html);
        return $pdf->stream('jobs_with_most_vacancies.pdf');
    }

    public function vacantJobsExportCSV()
    {
        $vacantJobs = JobInfo::select('title', 'company_name', 'vacancy')
            ->orderBy('vacancy', 'desc')
            ->get();

        $totalVacancies = JobInfo::sum('vacancy');

        // Prepare CSV content
        $csvContent = "Job Title,Company,Vacancies,Percentage\n";

        foreach ($vacantJobs as $job) {
            $percentage = $totalVacancies > 0 ?
                number_format(($job->vacancy / $totalVacancies) * 100, 1) . '%' : '0%';
            $csvContent .= "\"{$job->title}\",\"{$job->company_name}\",{$job->vacancy},{$percentage}\n";
        }

        return response($csvContent, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="jobs_with_most_vacancies.csv"');
    }
}
