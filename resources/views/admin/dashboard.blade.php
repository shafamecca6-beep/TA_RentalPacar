<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Jasa Sewa Pacar</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* --- CUSTOM STYLING UNTUK TEMA PINK --- */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff1f2; 
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin .25s ease-out;
            background: linear-gradient(180deg, #fb7185 0%, #db2777 100%); 
            color: white;
            width: 15rem;
            position: fixed;
            z-index: 1000;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.2rem 1.5rem;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        #sidebar-wrapper .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 1rem 1.5rem;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        /* Wrapper Logic */
        #page-content-wrapper {
            min-width: 100vw;
            transition: margin .25s ease-out;
        }

        /* Toggled State (Desktop vs Mobile) */
        body.sb-sidenav-toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }
            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                margin-left: 15rem;
            }
            body.sb-sidenav-toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
            body.sb-sidenav-toggled #page-content-wrapper {
                margin-left: 0;
            }
        }

        /* Override Bootstrap Colors to Pink */
        .text-pink { color: #db2777; }
        .bg-pink-soft { background-color: #fce7f3; }
        
        .btn-primary {
            background-color: #ec4899;
            border-color: #ec4899;
        }
        .btn-primary:hover {
            background-color: #be185d;
            border-color: #be185d;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        /* Table Styling */
        .table thead th {
            border-bottom: 2px solid #fce7f3;
            color: #6c757d;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
        }
        
        .avatar-circle {
            width: 35px;
            height: 35px;
            background-color: #fbcfe8;
            color: #db2777;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading fw-bold d-flex align-items-center">
                <div class="bg-white bg-opacity-25 p-2 rounded-circle me-2">
                    <i class="fa-solid fa-heart"></i>
                </div>
                Rental Pacar.Id
            </div>
            <div class="list-group list-group-flush mt-3">
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-gauge me-2"></i> Dashboard
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-4 py-3">
                <div class="container-fluid p-0">
                    <button class="btn btn-light text-pink" id="sidebarToggle">
                        <i class="fa-solid fa-bars fs-5"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item position-relative me-4">
                                <a class="nav-link text-secondary" href="#">
                                    <i class="fa-solid fa-bell fs-5"></i>
                                    <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">3</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://i.pinimg.com/736x/2f/02/5a/2f025aa02bd16703950afaf16960911d.jpg" alt="Admin" width="35" height="35" class="rounded-circle border border-2 border-danger me-2">
                                    <span class="fw-medium text-dark">Admin</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; padding: 5;">Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="container-fluid px-4 py-4">
                
                <div class="row g-4 mb-4">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-start border-4 border-danger">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted small fw-bold text-uppercase mb-1">Total Klien</p>
                                    <h3 class="fw-bold mb-0">{{ $orders->count() }}</h3>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded text-danger">
                                    <i class="fa-solid fa-users fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-start border-4 border-info">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted small fw-bold text-uppercase mb-1">Order Aktif</p>
                                    <h3 class="fw-bold mb-0">{{ $orders->where('status', 'pending')->count() }}</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded text-info">
                                    <i class="fa-solid fa-heart-pulse fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-start border-4 border-warning">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted small fw-bold text-uppercase mb-1">Pendapatan</p>
                                    <h3 class="fw-bold mb-0">0.Rp</h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded text-warning">
                                    <i class="fa-solid fa-coins fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 bg-primary text-white" style="background: linear-gradient(45deg, #ec4899, #f43f5e);">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-white-50 small fw-bold text-uppercase mb-1">Hari Ini</p>
                                    <h3 class="fw-bold mb-0">{{ $orders->where('order_date', \Carbon\Carbon::today()->toDateString())->count() }} Order</h3>
                                </div>
                                <div class="bg-white bg-opacity-25 p-3 rounded">
                                    <i class="fa-solid fa-calendar-day fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                                <h5 class="mb-0 fw-bold text-dark">Daftar Pesanan</h5>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" onclick="openModal()">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="ps-4">ID</th>
                                                <th>Klien</th>
                                                <th>Pacar (Talent)</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="ps-4 text-muted small">#{{ $order->id }}</td>
                                                <td class="fw-bold text-dark">{{ $order->nama_pasangan }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-circle me-2 small">{{ $order->pacar ? substr($order->pacar->nama, 0, 1) : '' }}</div>
                                                        <span>{{ $order->pacar ? $order->pacar->nama : '' }}</span>
                                                    </div>
                                                </td>
                                                <td class="small text-muted">
                                                    <div><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($order->order_date)->format('d M') }}</div>
                                                    <div><i class="fa-regular fa-clock me-1"></i> --:--</div>
                                                </td>
                                                <td>
                                                    @if($order->status == 'pending')
                                                        <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2">Menunggu</span>
                                                    @elseif($order->status == 'completed')
                                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">Selesai</span>
                                                    @else
                                                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">{{ $order->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-light text-primary me-1" title="Edit" onclick='editOrder({{ $order->id }})'><i class="fa-solid fa-pen"></i></button>
                                                    <button class="btn btn-sm btn-light text-danger" title="Hapus" onclick='deleteOrder({{ $order->id }})'><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header bg-white py-3 border-bottom-0">
                                <h5 class="mb-0 fw-bold text-dark">Statistik</h5>
                            </div>
                            <div class="card-body">
                                <div style="height: 300px;">
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="crudModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="modalTitle">Tambah Pesanan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="orderForm" action="{{ route('order.store') }}" method="POST" onsubmit="handleFormSubmit(event)">
                        @csrf
                        <input type="hidden" id="orderId">

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Nama Klien</label>
                            <input type="text" class="form-control" name="nama_pasangan" id="clientName" placeholder="Contoh: Budi" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Contoh: budi@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Nomor WA</label>
                            <input type="text" class="form-control" name="nomor_wa" id="nomor_wa" placeholder="Contoh: 08123456789" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Pilih Pacar</label>
                            <select class="form-select" name="pacar_id" id="partnerName" required>
                                <option value="">Pilih Talent...</option>
                                @foreach($pacars as $pacar)
                                <option value="{{ $pacar->id }}">{{ $pacar->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Jadwal</label>
                            <input type="date" class="form-control" name="order_date" id="schedule" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="pending">Menunggu</option>
                                <option value="ongoing">Berlangsung</option>
                                <option value="completed">Selesai</option>
                                <option value="cancelled">Batal</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold py-2">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // --- 1. SETUP & TOGGLE SIDEBAR ---
        window.addEventListener('DOMContentLoaded', event => {
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                });
            }
        });

        // --- 2. CRUD LOGIC (Adapted for Bootstrap Modal) ---
        let bsModal;

        function openModal(isEdit = false, orderId = null) {
            const modalEl = document.getElementById('crudModal');
            bsModal = new bootstrap.Modal(modalEl); // Init Bootstrap Modal

            const title = document.getElementById('modalTitle');
            const form = document.getElementById('orderForm');

            if (!isEdit) {
                title.innerText = "Tambah Pesanan Baru";
                form.reset();
                document.getElementById('orderId').value = '';
                form.action = "{{ route('order.store') }}";
                form.method = "POST";
            } else {
                title.innerText = "Edit Pesanan";
                document.getElementById('orderId').value = orderId;
                form.action = `/order/${orderId}`;
                form.method = "POST";
                // Add method override for PUT
                let methodInput = form.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }
                methodInput.value = 'PUT';
            }
            bsModal.show();
        }

        async function editOrder(orderId) {
            try {
                const response = await fetch(`/admin/dashboard/edit/${orderId}`);
                const order = await response.json();
                openModal(true, orderId);
                // Populate form
                document.getElementById('clientName').value = order.nama_pasangan;
                document.getElementById('email').value = order.email;
                document.getElementById('nomor_wa').value = order.nomor_wa;
                document.getElementById('partnerName').value = order.pacar_id;
                document.getElementById('schedule').value = order.order_date;
                document.getElementById('status').value = order.status;
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data order.');
            }
        }

        async function handleFormSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                });

                if (response.ok) {
                    bsModal.hide();
                    location.reload();
                } else {
                    alert('Terjadi kesalahan saat menyimpan data.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan data.');
            }
        }

        function deleteOrder(orderId) {
            if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                fetch(`/order/${orderId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus data.');
                });
            }
        }

        // --- 5. CHART JS ---
        const ctx = document.getElementById('revenueChart').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(236, 72, 153, 0.5)');
        gradient.addColorStop(1, 'rgba(236, 72, 153, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [10, 25, 18, 45, 38, 55],
                    borderColor: '#ec4899',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        // Initialize
        // renderTable(); // Removed as table is now server-side rendered
    </script>
</body>
</html>