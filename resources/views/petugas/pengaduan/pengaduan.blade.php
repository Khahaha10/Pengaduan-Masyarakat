@extends('petugas.index')

@section('konten')
    <div class="row">
        <div class="d-flex col-md-12">
            <div class="col-md-12">
                <div class="main-content table-container d-flex" style="margin-top: 15px; padding: 10px">
                    <div class="left-section col-md-4" style="display: flex; align-items: center;">
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
            
                    <div class="center-section col-md-4">
                        <h4 class="text-judul tengah"><b>Pengaduan</b></h4>
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

                <div class="main-content table-container pengaduan-pending">
                    <h4 class="text-center">Pengaduan Yang Belum Ditanggapi</h4>
                
                    <hr>
                    <div class="pengaduan-container">
                        @foreach ($pengaduanPending as $item)
                            <div class="pengaduan-card" data-bs-toggle="modal" data-bs-target="#pengaduanProses{{ $item->id_pengaduan }}">
                                <h5 class="text-center"><b>{{ $item->judul_pengaduan }}</b></h5>
                                <img src="{{ asset('storage/pengaduan/' . $item->foto) }}" alt="Foto Pengaduan" class="pengaduan-image">
                                <p>{{ \Str::limit($item->isi_pengaduan, 100) }}</p>
                                <div class="pengaduan-footer">
                                    <p class="text-warning status">{{ ucfirst($item->status) }}</p>
                                    <p class="text-muted waktu">{{ $item->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            @include('petugas.pengaduan.pengaduan_proses', ['item' => $item])
                        @endforeach
                    </div>
                </div>
            </div>
            @include('petugas.list_pengaduan')
        </div>
    </div>
@endsection