<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal PKL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f7fb;
        }

        .navbar{
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,.08);
        }

        .table{
            background:white;
        }

        .btn{
            border-radius:10px;
        }

        

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold" href="/">

<i class="bi bi-journal-bookmark-fill"></i>

Jurnal PKL

</a>

<div>

<a href="{{ route('journals.index') }}" class="btn btn-light me-2">
    <i class="bi bi-journal-text"></i> Jurnal
</a>

<a href="{{ route('profiles.index') }}" class="btn btn-success">
    <i class="bi bi-person-circle"></i> Profil
</a>
</div>

</div>

</nav>

<div class="container mt-4">

<div class="card">

<div class="card-body">

@yield('content')

</div>

</div>

</div>

</body>
</html>