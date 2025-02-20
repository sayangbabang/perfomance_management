<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JagooIT</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/background.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: white;
        }

        .navbar {
            border-bottom: 3px solid #ff5733;
        }

        .btn:hover {
            color: #ff5733;
            border-color: #ff5733;
        }

        .content {
            min-height: calc(100vh - 100px);
            padding: 100px;
            text-align: left;
            max-width: 800px;
            margin-left: 1.5vh;
        }

        .content p {
            color: #BABABA;
        }

        .rep {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            font-size: 12px;
            background-color: #EE5656;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .rep:hover {
            background-color: #6c2828;
            transform: translate(-50%, -50%) scale(1.1);
        }

        footer {
            background: #ffffff;
            color: black;
            text-align: center;
            padding: 10px 0;
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

        .fiw {
            text-align: left;
        }

        @media (max-width: 768px) {
            .content {
                text-align: center;
                padding: 50px 10px;
            }

            .content p {
                max-width: 100%;
                text-align: center;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>
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


    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="social-icons">
                <p id="fiw">Follow Us</p>
                <a href="https://www.instagram.com/jagooit/"><img src="{{ asset('img/instagram.png') }}" alt="Instagram"></a>
                <a href="https://api.whatsapp.com/send?phone=6281320269540"><img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp"></a>
                <a href="https://www.linkedin.com/company/pt-jago-talenta-indonesia/"><img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn"></a>
            </div>
           <!-- Bagian Kanan: Copyright -->
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