<!DOCTYPE html>
<html>
<head>
    <title>Job Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body { font-family: system-ui; background: #f9fafb; }
        table { width:100%; border-collapse: collapse; }
        th, td { padding:10px; border-bottom:1px solid #e5e7eb; }
        .success { color: green; }
        .failed { color: red; }
        .running { color: orange; }
    </style>
</head>
<body class="p-6">

<h1 class="text-xl font-bold mb-4">
    Laravel Job Monitor
</h1>

@yield('content')

</body>
</html>
