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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
        $totalDisabilityOccurrencesCount = $disabilityOccurrences->sum(); // Calculate the total count

        // Prepare data for the view
        $data = [];
        foreach ($disabilityOccurrences as $disability => $count) {
            $data[] = [
                'Disability Occurrence' => $disability,
                'Count' => $count,
                'Percentage' => $totalDisabilityOccurrencesCount > 0 ? number_format(($count / $totalDisabilityOccurrencesCount) * 100, 1) . '%' : '0%',

            ];
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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
            return $experiences->sum('years');
        });

        // Sort employers by total years in descending order
        $sortedEmployerYears = $employerYears->sortDesc();

        // Calculate the total years of all work experiences
        $totalYears = $sortedEmployerYears->sum();

        // Round the total years to two decimal places
        $roundedTotalYears = round($totalYears, 2);

        // Prepare the data for the view with rounded years and percentage
        $data = [];
        foreach ($sortedEmployerYears as $employer => $years) {
            // Round the individual years to two decimal places
            $roundedYears = round($years);
            // Calculate the percentage based on rounded total years
            $percentage = $roundedTotalYears > 0 ? number_format(($roundedYears / $roundedTotalYears) * 100, 1) . '%' : '0%';
            $data[] = [
                'Employer' => $employer,
                'Years' => $roundedYears,
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
            <p style="">PERSONS WITH DISABILITIES AFFAIRS DIVISION</p>
            </div>
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



}
