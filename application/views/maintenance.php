<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?> - SIAP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/app-assets/img/logo.png'); ?>">
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Styling -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .maintenance-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 30px;
        }

        .maintenance-box {
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .maintenance-icon {
            font-size: 80px;
            color: #ffc107;
        }

        .btn-custom {
            padding: 10px 25px;
            font-size: 16px;
            margin-top: 25px;
        }

        .info-text {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }

        .info-text a {
            color: #007bff;
            text-decoration: none;
        }

        .info-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="maintenance-wrapper">
        <div class="maintenance-box">
            <div class="maintenance-icon mb-4">
                <i class="fas fa-tools"></i>
            </div>
            <h1 class="mb-3">Sedang Dalam Pemeliharaan!</h1>
            <p class="text-muted">Sistem SIAP <i>(Sistem Informasi pAsien Pulang)</i> sedang dalam Pemeliharaan<br>Silakan kunjungi kembali dalam beberapa saat.</p>

            <hr>

            <div class="info-text">
                Informasi lebih lengkap bisa hubungi <a href="https://wa.link/4ia9bz" target="_blank">Divis Mutu PHKA</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>