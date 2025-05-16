@extends('backend.index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"> {{ $userCount }} </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Pengguna</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"> {{ $produkCount }} </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-package-variant icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Produk</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"> {{ $kategoriCount }} </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-shape-outline icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Kategori Keris</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"> {{ $sellerCount }} </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-storefront icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Seller</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- -------------------------------- --}}
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sekilas User</h4>
                        <div class="position-relative">
                            <div class="daoughnutchart-wrapper">
                                <canvas id="sekilas_user" class="transaction-chart"></canvas>
                            </div>
                            <div class="custom-value"> {{ ($sellerCount ?? 0) + ($nonSellerCount ?? 0) }}
                                <span></span>
                            </div>
                        </div>
                        <div
                            class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-2 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">Pembeli Aktif (Seller)</h6>
                            </div>
                            <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0"> {{ $sellerCount }} </h6>
                            </div>
                        </div>
                        <div
                            class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-2 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">Pembeli Pasif (Non-Seller)</h6>
                            </div>
                            <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0"> {{ $nonSellerCount }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Pengguna Baru</h4>
                            <p class="text-muted mb-1">Status</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach ($nuwUser as $user)
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <i class="mdi mdi-account-plus"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"> {{ $user->name }} </h6>
                                                    <p class="text-muted mb-0"> {{ $user->no_wa }} </p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted"> {{ $user->created_at->diffForHumans() }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Tangkap elemen canvas dan simpan dalam variabel
        const canvas = document.getElementById('sekilas_user');
        // Ambil data dari backend via Blade
        const sellerCount = {{ $sellerCount }};
        const nonSellerCount = {{ $nonSellerCount }};

        // Pastikan elemen ada sebelum buat Chart
        if (canvas) {
            new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: ["Pembeli Aktif (Seller)", "Pembeli Pasif (Non-Seller)"],
                    datasets: [{
                        data: [sellerCount, nonSellerCount],
                        backgroundColor: [
                            "#00d25b", "#ffab00",
                        ],
                        borderColor: "#191c24"
                    }]
                },
                options: {
                    cutout: 70,
                    animation: {
                        easing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                },
            });
        }
    </script>
@endsection
