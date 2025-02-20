<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Report</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap');
        @import url('https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css');

        .footer-container {
            background-color: #dddddd;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px 0;
            margin-top: 40px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            text-align: center;
            color: #333;
            font-size: 0.9rem;
            margin: 0;
            padding: 0 15px;
        }

        main {
            padding-bottom: 70px;
        }

        body {
            display: flex;
            background-color: #f4f3f3;
        }

        aside {
            background-color: #dddddd;
            color: black;
            width: 240px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        aside.mini {
            width: 80px;
            padding: 1.5rem 0.5rem;
        }

        aside button {
            background-color: transparent;
            border: none;
            height: 48px;
            width: 60px;
            font-size: 1.25rem;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            margin-bottom: 0;
            align-self: flex-start;
        }

        aside .link {
            flex: 1;
        }

        aside ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        aside ul li {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        aside ul li i {
            width: 24px;
            height: 24px;
            font-size: 1.25rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 1rem;
        }

        aside ul li label {
            margin: 0;
            font-size: 1rem;
            white-space: nowrap;
            cursor: inherit;
        }

        aside.mini ul li {
            padding: 0.75rem;
            justify-content: center;
        }

        aside.mini ul li i {
            margin-right: 0;
        }

        aside.mini ul li label {
            display: none;
        }

        aside ul li.active,
        aside ul li:hover {
            background-color: #ff7700;
            color: #000;
        }

        .dropdown-menu .dropdown-item {
            color: #000;
            /* Warna teks default */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Animasi perubahan */
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #FF7700 !important;
            /* Warna latar belakang saat hover */
            color: #fff !important;
            /* Warna teks saat hover */
        }


        /* Main content adjustment */
        .main-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        main {
            margin-left: 240px;
            width: calc(100% - 240px);
            transition: all 0.3s ease;
            padding: 1.5rem;
            max-width: 1200px;
        }

        aside.mini+.main-wrapper main {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        .page-title {
            color: #2B2B2B;
            font-weight: bold;
            margin-bottom: 0;
            text-align: center;
        }

        .page-subtitle {
            color: #6C757D;
            font-size: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-control,
        .form-select {
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .bs-stepper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-bottom: 20px;
        }

        .bs-stepper-header {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .step {
            flex: 0 1 auto;
            width: 250px;
        }

        .bs-stepper-header::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 2px;
            background-color: #dee2e6;
            z-index: 1;
        }

        .step-trigger {
            display: flex;
            align-items: center;
            padding: 0;
            border: none;
            background: none;
            width: 100%;
            text-decoration: none;
        }

        .step-status {
            background-color: #fff;
            border-radius: 50px;
            padding: 8px 20px;
            width: auto;
            min-width: 200px;
            position: relative;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .bs-stepper-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #dee2e6;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .step.active .bs-stepper-circle {
            background-color: #ee5656;
            color: white;
        }

        .bs-stepper-label {
            margin: 0;
            font-weight: 500;
            color: #6c757d;
        }

        .step.active .bs-stepper-label {
            color: black;
        }

        .btn-with-circle {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px;
            border: none;
            background: none;
            font-weight: 500;
            color: #495057;
        }

        /* Menghilangkan efek hover */
        .btn-with-circle:hover {
            background-color: transparent;
            color: #495057;
        }

        .circle-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* Memastikan circle icon tidak berubah saat hover */
        .btn-primary.btn-with-circle:hover,
        .btn-secondary.btn-with-circle:hover {
            background-color: transparent;
        }

        .btn-primary.btn-with-circle:hover .circle-icon,
        .btn-secondary.btn-with-circle:hover .circle-icon {
            background-color: black;
        }

        .content {
            display: none;
        }

        .content.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .nav-link {
            border-radius: 4px;
            margin: 5px 0;
            transition: all 0.3s ease;
            color: #000 !important;
            font-weight: bold;
        }

        .nav-link.active {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            margin-bottom: 80px;
            padding: 0 15px;
        }

        .logo-img {
            width: 120px;
            height: auto;
            display: none;
            /* Hidden by default */
            margin-left: 10px;
            transition: all 0.3s ease;
            opacity: 0;
        }

        aside:not(.mini) .logo-img {
            display: block;
            /* Show when sidebar is open */
            opacity: 1;
        }

        .custom-btn {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside>
        <div style="display: flex; align-items: center; margin-bottom: 2rem;">
            <button id="toggle">
                <i class="fi fi-rr-list"></i>
            </button>
            <img src="https://jagooit.com/assets/img/logo.png" alt="Jago Logo" class="logo-img">
        </div>
        <div class="link">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-decoration-none text-dark">
                        <i class="fi fi-rr-home"></i>
                        <label class="ms-2">Dashboard</label>
                    </a>
                </li>

                <li>
                    <a href="{{ route('management.create') }}" class="d-flex align-items-center text-decoration-none text-dark">
                        <i class="fi fi-rr-document"></i>
                        <label class="ms-2">Form</label>
                    </a>
                </li>

                <li class="active">
                    <i class="fi fi-rr-chart-histogram"></i>
                    <label class="ms-2">Report</label>
                </li>
                <li style="margin-top:360px">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-decoration-none text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:normal;">
                        <ion-icon name="person-circle-outline" size="large"></ion-icon>
                        <label class="ms-2">{{ Str::limit(Auth::user()->name, 10, '...') }}</label>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit</a></li>
                        <li style="margin-top:-10px">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="light">
        <div class="bg-light p-4">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="https://jagooit.com/assets/img/logo.png" alt="Logo" width="148,5" height="60,625" class="d-inline-block align-text-top">
                    </a>
                </div>
            </nav>
            <nav class="nav nav-pills nav-justified">
                <a class="nav-link" href="/laporan">Data Laporan</a>
                <a class="nav-link active" aria-current="page" href="/laporan">Form Laporan</a>
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </nav>
        </div>
    </div>

    <div style="margin: 80px; background-color:rgba(255, 255, 255, 0.74); padding: 10px; margin-left: 300px;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID LAPORAN</th>
                    <th>ID TALENT</th>
                    <th>TANGGAL</th>
                    <th>DESKRIPSI</th>
                    <th>DURASI KERJA</th>
                    <th>JENIS KEHADIRAN</th>
                    <th>TIPE HARI</th>
                    <th>LOKASI</th>
                    <th>CATATAN KOREKSI</th>
                    <th>APPROVAL FILE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $row)
                @if (Auth::user()->id === $row->id_talent)
                <tr>
                    <td>{{ $row->id_laporan }}</td>
                    <td>{{ $row->id_talent }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td><?= str_word_count($row->tanggal) ?></td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>{{ $row->durasi }}</td>
                    <td>{{ $row->jenis }}</td>
                    <td>{{ $row->tipe }}</td>
                    <td>
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#modalMap{{ $row->id_laporan }}">Lihat Lokasi</button>
                    </td>
                    <td>{{ $row->catatan_koreksi }}</td>
                    <td>
                        @if (empty($row->justifikasi))
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#modalApproval{{ $row->id_laporan }}" style="background-color: #a9a9a9; " disabled>
                            File tidak ada
                        </button>
                        @else
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#modalApproval{{ $row->id_laporan }}" style="background-color: #ff7700;">
                            Lihat File (Pop-up)
                        </button>
                        @endif
                    </td>
                </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modalApproval{{ $row->id_laporan }}" tabindex="-1" aria-labelledby="modalLabelApproval{{ $row->id_laporan }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabelApproval{{ $row->id_laporan }}">File Approval</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Menampilkan file PDF atau gambar -->
                                        @php
                                        $filePath = storage_path('app/public/' . $row->justifikasi);
                                        @endphp

                                        @if (file_exists($filePath))
                                    </div>
                                    <iframe src="{{ asset('storage/' . $row->justifikasi) }}" width="100%" height="500px"></iframe>
                                    @else
                                    <p>File tidak ditemukan.</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Map -->
                        <div class="modal fade" id="modalMap{{ $row->id_laporan }}" tabindex="-1" aria-labelledby="modalMapLabel{{ $row->id_laporan }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalMapLabel{{ $row->id_laporan }}">Map</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="map{{ $row->id_laporan }}" style="height: 400px;" data-coordinates="{{ $row->lokasi }}"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <script>
// Function to initialize map
function initMap(id, lat, lng) {
        var map = L.map(id).setView([lat, lng], 20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([lat, lng]).addTo(map).openPopup();
    }

    // Initialize maps after modals are shown
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function(button) {
        button.addEventListener('click', function(e) {
            var target = e.target.getAttribute('data-bs-target');
            if (target) {
                var modalId = target.replace('#', '');
                var mapId = 'map' + modalId.replace('modalMap', '');
                var modal = document.getElementById(modalId);
                
                modal.addEventListener('shown.bs.modal', function() {
                    setTimeout(function() {
                        var mapElement = document.getElementById(mapId);
                        if (mapElement) {
                            var coordinates = mapElement.getAttribute('data-coordinates').split(',');
                            var lat = parseFloat(coordinates[0]);
                            var lng = parseFloat(coordinates[1]);
                            initMap(mapId, lat, lng);
                        }
                    }, 300); // Delay to ensure modal is fully shown
                }, { once: true }); // Ensure the event listener is only added once
            }
        });
    });
                        </script>


    </div>
    </td>
    </tr>
    @endif
    @endforeach

    </tbody>
    </table>
    </div>

    <!-- Footer -->
    <div class="footer-container" style="position:s">
        <div class="footer-content">
            © Copyright 2025 PT Jago Talenta Indonesia. All Rights Reserved
        </div>
    </div>

    </main>
    </div>
    </div>


    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    let sideBar = document.querySelector("aside");
        let toggle = document.querySelector("#toggle");
        toggle.addEventListener("click", function(e) {
            if (sideBar.classList.contains("mini")) {
                sideBar.classList.remove("mini");
            } else {
                sideBar.classList.add("mini");
            }
        });
    </script>
</body>

</html>