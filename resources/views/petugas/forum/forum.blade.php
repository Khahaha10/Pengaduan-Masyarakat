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

            <div class="row main-content1 table-container">
                @foreach ($forums as $forum)
                <div class="col-md-12 mb-3">
                    <div class="hiha">
                        <div class="card"  style="padding: 10px 20px">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        @if ($forum->masyarakatYangMembuat->foto_profil)
                                            <img src="{{ asset('storage/foto_masyarakat/' . $forum->masyarakatYangMembuat->foto_profil) }}" alt="Foto Profil" 
                                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                        @else
                                            <i class="bx bx-user-circle" style="font-size: 35px;"></i>
                                        @endif
                                        <div class="ms-2" style="font-size: 18px">
                                            <strong>{{ $forum->masyarakatYangMembuat->nama_masyarakat }}</strong>
                                        </div>
                                    </div>
                                    <div class="text-muted" style="font-size: 14px;">
                                        {{ $forum->created_at->format('d M Y H:i') }}
                                    </div>
                                </div>
                                
                                <h3 class="text-center" style="margin-bottom: 40px">{{ $forum->judul }}</h3>
                                
                                <div>
                                    <p>{{ $forum->isi_forum }}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-start align-items-center">
                                            @if($forum->komentarPadaForum->count() > 0)
                                                <button class="btn btn-link show-replies-btn" style="margin-right: 35px; padding: 0" data-forum-id="{{ $forum->id_forum }}">Show Replies</button>
                                            @endif
                                        </div>

                                        
                                        @if(Auth::user()->role !== 'petugas')
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-icon ms-2" data-bs-toggle="modal" data-bs-target="#deleteForumModal-{{ $forum->id_forum }}">
                                                    <i class='bx bx-trash' style="font-size: 16px"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="replies-container mt-3" id="replies-{{ $forum->id_forum }}" style="display: none;">
                                        @foreach ($forum->komentarPadaForum as $comment)
                                            <div class="card mt-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        @if ($comment->masyarakatYangMengomentari->foto_profil)
                                                            <img src="{{ asset('storage/foto_masyarakat/' . $comment->masyarakatYangMengomentari->foto_profil) }}" 
                                                                alt="Foto Profil" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                                        @else
                                                            <i class="bx bx-user-circle" style="font-size: 40px;"></i>
                                                        @endif
                                                        <div class="ms-2">
                                                            <strong>{{ $comment->masyarakatYangMengomentari->nama_masyarakat ?? 'Anonymous' }}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="ms-5 mt-2">
                                                        <p class="mb-3">{{ $comment->isi_komentar }}</p>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="text-muted mb-0" style="font-size: 12px;">{{ $comment->created_at->format('d M Y H:i') }}</p>

                                                            @if(Auth::user()->role !== 'petugas')
                                                                <div class="d-flex">
                                                                    <button class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteKomentarModal-{{ $comment->id_komentar }}">
                                                                        <i class='bx bx-trash' style="font-size: 14px;"></i>
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('petugas.forum.komen_delete', ['comment' => $comment] )

                                        @endforeach

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('petugas.forum.forum_delete', ['forum' => $forum])
                
                @endforeach
            </div>

        </div>

        @include('petugas.list_pengaduan')
    </div>
</div>
@endsection
