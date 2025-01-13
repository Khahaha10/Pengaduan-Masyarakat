@extends('petugas.index')

@section('konten')
<div class="row">
    <div class="d-flex col-md-12">
        <div class="col-md-12">
            <div class="main-content table-container d-flex" style="margin-top: 15px; padding: 10px">
                <div class="left-section col-md-4 d-flex align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editPetugasModal" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                        @if (Auth::user()->foto_profil)
                            <img src="{{ asset('storage/foto_petugas/' . Auth::user()->foto_profil) }}" alt="Foto Profil" 
                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                        @else
                            <i class="bx bx-user-circle" id="profileIcon" style="font-size: 35px;"></i>
                        @endif
                        <span style="margin-left: 8px; font-size: 18px; font-weight: 500;"><b>{{ Auth::user()->nama_petugas }}</b></span>
                    </a>
                </div>
                <div class="center-section col-md-4 d-flex justify-content-center align-items-center">
                    <h4 class="text-judul"><b>Forum Diskusi</b></h4>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success floating-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger floating-message">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row main-content1 table-container d-flex justify-content-center align-items-center" style="max-height: 760px; padding: 20px">

                <div class="w-100 d-flex justify-content-start mt-1">
                    <h2>Welcome! {{ Auth::user()->nama_petugas }}</h2>
                </div>

                <div class="row w-100 d-flex justify-content-center mt-1">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center back-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Masyarakat</h5>
                                <p class="card-text">
                                    <span style="font-size: 24px; font-weight: bold;">{{ $jumlahMasyarakat }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center back-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Petugas</h5>
                                <p class="card-text">
                                    <span style="font-size: 24px; font-weight: bold;">{{ $jumlahPetugas }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center back-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Pengaduan</h5>
                                <p class="card-text">
                                    <span style="font-size: 24px; font-weight: bold;">{{ $jumlahPengaduan }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center back-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pengaduan Terverifikasi</h5>
                                <p class="card-text">
                                    <span style="font-size: 24px; font-weight: bold;">{{ $jumlahPengaduanTerverifikasi }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="infoChart" width="400" height="190"></canvas>
                    </div>
                </div>
            </div>
        </div>

        @include('petugas.list_pengaduan')
    </div>
</div>

<script>
    const ctx = document.getElementById('infoChart').getContext('2d');
    const infoChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jumlah Masyarakat', 'Jumlah Petugas', 'Jumlah Pengaduan', 'Pengaduan Terverifikasi'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    {{ $jumlahMasyarakat }},
                    {{ $jumlahPetugas }},
                    {{ $jumlahPengaduan }},
                    {{ $jumlahPengaduanTerverifikasi }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)', 
                    'rgba(255, 99, 132, 0.5)', 
                    'rgba(255, 206, 86, 0.5)', 
                    'rgba(75, 192, 192, 0.5)' 
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
