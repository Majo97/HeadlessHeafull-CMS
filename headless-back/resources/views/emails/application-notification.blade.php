<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Application Submission</title>
</head>
<body>
    <h2>New Application Submission</h2>
  
    <p>A new application has been submitted for the following position:</p>
    <p>Position: {{ $application->position->title }}</p>
    <p>Applicant: {{ $application->name }} {{ $application->last_name }}</p>
    <p>Email: {{ $application->email }}</p>


</body>
</html>
