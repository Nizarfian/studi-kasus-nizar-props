<?php
include '../config.php'
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nizar-Props</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


    <!-- Custom CSS -->
    <style>
        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            width: 250px;
            /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            background-color: #f8f9fa;
            padding-top: 3.5rem;
            /* Adjust this value based on your header height */
        }

        /* Sidebar links */
        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }

        /* On hover */
        .sidebar a:hover {
            background-color: #ccc;
        }

        /* Content */
        .content {
            margin-left: 250px;
            /* Adjust the margin based on sidebar width */
            padding: 20px;
        }
    </style>
</head>

<nav class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item ">
            <p class="nav-link " href="index.php">
                Nizar-Props
            </p>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-house-door-fill"></i>
                Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kategori.php">
                <i class="bi bi-grid-fill"></i>
                Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="produk.php">
                <i class="bi bi-phone-fill"></i>
                Produk
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="transaksi.php">
                <i class="bi bi-cash"></i>
                Transaksi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pelanggan.php">
                <i class="bi bi-person-lines-fill"></i>
                Daftar Pelanggan
            </a>
        </li>
    </ul>
</nav>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    $(document).ready(function () {
        var currentLocation = location.pathname;
        $('.nav-link').each(function () {
            var link = $(this).attr('href');
            // Jika alamat URL mengandung tautan di sidebar, tambahkan kelas 'active'
            if (currentLocation.indexOf(link) !== -1) {
                $(this).addClass('active');
            }
        });
    });
</script>