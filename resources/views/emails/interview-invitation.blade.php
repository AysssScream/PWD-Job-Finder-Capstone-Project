<!DOCTYPE html>
<html>
<head>
    <title>Interview Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Interview Invitation</h1>
    </div>

    <div class="content">
        {!! nl2br(e($interviewData['message'])) !!}

        <div class="footer">
            <p>Best regards,<br>
            {{ $interviewData['contact_person'] }}<br>
            {{ $interviewData['company_name'] }}<br>
            Email: {{ $interviewData['employer_email'] }}<br>
            Phone: {{ $interviewData['employer_phone'] }}</p>
        </div>
    </div>
</body>
</html>
