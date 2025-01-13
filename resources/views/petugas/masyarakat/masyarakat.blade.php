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

            <div class="row main-content1 table-container" style="max-height: 760px; padding: 20px">
                
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mb-3 col-md-4" data-bs-toggle="modal" data-bs-target="#tambahMasyarakatModal">
                        <i class='bx bx-plus' style="font-size: 16px;"></i> Tambah Masyarakat
                    </button>
                </div>                

                <table class="table table-hover table-borderless" style="width: 100%; table-layout: fixed; overflow-y: auto;">
                    <thead>
                        <tr>
                            <th style="width: 7%;">No</th>
                            <th style="width: 6%;">Foto</th>
                            <th>Nama Masyarakat</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th style="width: 11%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($masyarakat as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($item->foto_profil)
                                        <img src="{{ asset('storage/foto_masyarakat/' . $item->foto_profil) }}" alt="Foto Profil" 
                                            style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <i class="bx bx-user-circle" style="font-size: 35px;"></i>
                                    @endif
                                </td>
                                <td>{{ $item->nama_masyarakat }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>
                                    <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editMasyarakatModal{{ $item->id_masyarakat }}">
                                        <i class="bx bx-edit" style="font-size: 16px;"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_masyarakat }}">
                                        <i class="bx bx-trash" style="font-size: 16px;"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('petugas.masyarakat.masyarakat_edit')
                            @include('petugas.masyarakat.masyarakat_delete')

                        @endforeach
                        <div class="modal fade" id="tambahMasyarakatModal" tabindex="-1" aria-labelledby="tambahMasyarakatModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahMasyarakatModalLabel">Tambah Masyarakat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('petugas.masyarakat.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama_masyarakat" class="form-label">Nama Masyarakat</label>
                                                <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" name="nik" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="telp" name="telp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>

        @include('petugas.list_pengaduan')
    </div>
</div>
@endsection
