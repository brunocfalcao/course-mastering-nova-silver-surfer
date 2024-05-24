<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
            padding: 10px 0;
        }
        .content {
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Newsletter Header</h1>
        </div>
        <div class="content">
            <p>1. {{ env('APP_URL') . '/' . Storage::url($subscriber->course->filename_twitter) }}</p>
            <p>2. {{ eduka_url($subscriber->course->domain) }}</p>
            <p>3. {{ eduka_url($subscriber->course->domain, Storage::url($subscriber->course->filename_twitter)) }}</p>
            <p>4. {{  eduka_url($subscriber->course->domain, Storage::disk('public')->url($subscriber->course->filename_email_logo)) }}</p>
            <p>5. {{  eduka_url($subscriber->course->domain, Storage::disk('public')->url($subscriber->course->filename_email_logo)) }}</p>
        </div>
        <div class="footer">
            <p>Newsletter Footer</p>
        </div>
    </div>
</body>
</html>
