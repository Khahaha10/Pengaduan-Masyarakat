@extends('masyarakat.index')

@section('konten')
    <div class="row">
        <div class="d-flex col-md-12">
            <div class="col-md-12">
                <div class="main-content table-container d-flex" style="margin-top: 15px; padding: 10px">
                    <div class="left-section col-md-4" style="display: flex; align-items: center;">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editMasyarakatModal" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                            @if (Auth::user()->foto_profil)
                                <img src="{{ asset('storage/foto_masyarakat/' . Auth::user()->foto_profil) }}" alt="Foto Profil" 
                                    style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                            @else
                                <i class="bx bx-user-circle" id="profileIcon" style="font-size: 35px;"></i>
                            @endif
                            <span style="margin-left: 8px; font-size: 18px; font-weight: 500;"><b>{{ Auth::user()->nama_masyarakat }}</b></span>
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

                <div class="main-content table-container">
                    <form class="input-form" action="{{ route('masyarakat.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="judul_pengaduan"><b>Judul Pengaduan</b></label>
                        <input type="text" name="judul_pengaduan" id="judul_pengaduan" placeholder="Masukkan Judul Pengaduan" required>

                        <label for="foto"><b>Foto</b></label>
                        <input type="file" name="foto" id="foto">

                        <label for="isi_pengaduan"><b>Isi Pengaduan</b></label>
                        <textarea name="isi_pengaduan" id="isi_pengaduan" rows="6" placeholder="Masukkan Isi Pengaduan" required></textarea>

                        <div class="form-buttons justify-content-end">
                            <button type="submit" class="upload-btn"><i style="font-size: 20px" class='bx bx-check'></i>Submit</button>
                        </div>
                    </form>
                </div>
                
            </div>

            @include('masyarakat.list_pengaduan')
        </div>
    </div>
@endsection