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
                    <button type="button" class="btn btn-primary mb-3 col-md-4" data-bs-toggle="modal" data-bs-target="#tambahPetugasModal">
                        <i class='bx bx-plus' style="font-size: 16px;"></i> Tambah Petugas
                    </button>
                </div>                

                <table class="table table-hover table-borderless" style="width: 100%; table-layout: fixed; overflow-y: auto;">
                    <thead>
                        <tr>
                            <th style="width: 7%;">No</th>
                            <th style="width: 6%;">Foto</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th style="width: 11%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $key => $item)
                            <tr>
                                <td style="width: 7%;">{{ $key + 1 }}</td>
                                <td style="width: 6%;">
                                    @if ($item->foto_profil)
                                        <img src="{{ asset('storage/foto_petugas/' . $item->foto_profil) }}" alt="Foto" 
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <i class="bx bx-user-circle" style="font-size: 40px;"></i>
                                    @endif
                                </td>
                                <td>{{ $item->nama_petugas }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>{{ $item->email }}</td>
                                <td style="width: 11%;">
                                    <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPetugasModal{{ $item->id_petugas }}">
                                        <i class="bx bx-edit" style="font-size: 16px;"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePetugasModal{{ $item->id_petugas }}">
                                        <i class="bx bx-trash" style="font-size: 16px;"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('petugas.petugas.petugas_edit', ['item' => $item])
                            @include('petugas.petugas.petugas_delete', ['item' => $item])
                            
                        @endforeach
                            
                        @include('petugas.petugas.petugas_create')

                    </tbody>
                </table>
            </div>
        </div>

        @include('petugas.list_pengaduan')
    </div>
</div>
@endsection
