<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Aditya Dwi Rahmadi" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
            margin: 0px;
        }

        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        @page {
            /* margin: 2.5cm 2cm 2.5cm 2cm !important; */
            width: 210mm;
            height: 297mm;
        }

        .hide {
            display: none !important;
        }
    </style>
</head>

<body>
    @yield('main')
</body>

</html>
