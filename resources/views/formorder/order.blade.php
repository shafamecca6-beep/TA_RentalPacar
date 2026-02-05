<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Form Order</h1>
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="pacar_id" value="{{ $pacar->id }}">
                            <div class="mb-3">
                                <label for="nama_pasangan" class="form-label">Nama Kamu & Pasangan:</label>
                                <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_wa" class="form-label">Nomor WhatsApp:</label>
                                <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" required>
                            </div>
                            <div class="mb-3">
                                <label for="order_date" class="form-label">Tanggal Order:</label>
                                <input type="date" class="form-control" id="order_date" name="order_date" required>
                            </div>
                            <input type="hidden" name="status" value="pending">
                            <button type="submit" class="btn btn-primary w-100">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
