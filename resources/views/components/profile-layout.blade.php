<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'JagooIT') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            display: flex;
            background-color: #dddd;
            flex-direction: column;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: black;
        }

        .navbar {
            border-bottom: 3px solid #ff5733;
        }

        .btn:hover {
            color:rgb(255, 254, 254);
            border-color: #ff5733;
        }

        main {
            flex-grow: 1;
            padding: 50px;
        }

        .footer {
            background: #ffffff;
            color: black;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1500px;
            margin: 0 auto;
            padding: 10px;
        }

        .social-icons img {
            width: 25px;
            margin: 0 10px;
        }

        /* Styling untuk input fields */
        .form-control {
            border-radius: 8px;
            border: 2px solid #ff5733;
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        /* Fokus efek */
        .form-control:focus {
            border-color: #c70039;
            box-shadow: 0 0 5px rgba(199, 0, 57, 0.5);
        }

        /* Styling untuk tombol */
        .btn-primary, .btn-danger {
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        /* Hover efek */
        .btn-primary:hover, .btn-danger:hover {
            background-color:rgb(0, 0, 0);
            border-color: #ff7700;
        }

        /* Styling untuk section */
        .profile-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light px-3">
        <a class="navbar-brand" href="/dashboard">
            <img src="{{ asset('img/jagoit.png') }}" alt="logo" width="120">
        </a>
        <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="social-icons">
                <p>Follow Us</p>
                <a href="https://www.instagram.com/jagooit/"><img src="{{ asset('img/instagram.png') }}" alt="Instagram"></a>
                <a href="https://api.whatsapp.com/send?phone=6281320269540"><img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp"></a>
                <a href="https://www.linkedin.com/company/pt-jago-talenta-indonesia/"><img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn"></a>
            </div>
            <div class="text-end">
                <p class="m-0">&copy; Copyright 2025 <strong>PT Jago Talenta Indonesia</strong></p>
                <p class="m-0">All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
