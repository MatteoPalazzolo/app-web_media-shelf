<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>
    <!-- JS CDN -->
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/init.css">
</head>
<body>
     <div hx-get="/pages/intro/intro.php" hx-trigger="load" hx-target="body"></div> 
    <!-- <div hx-get="/pages/cards-list-page/cards-list-page.php" hx-trigger="load" hx-target="body"></div> -->
</body>
</html>