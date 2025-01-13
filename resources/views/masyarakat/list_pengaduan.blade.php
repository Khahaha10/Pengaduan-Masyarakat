<div class="col-md-4 complaint-list" style="margin-left: -328px">
    <h3>Daftar Pengaduanmu</h3>
    @foreach ($pengaduan as $item)
        <div class="complaint-card">
            <p class="d-flex align-items-center">
                @if (Auth::user()->foto_profil)
                    <img src="{{ asset('storage/foto_masyarakat/' . Auth::user()->foto_profil) }}" alt="Foto Profil" 
                        style="width: 25px; height: 25px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                @else
                    <i class="bx bx-user-circle" id="profileIcon" style="font-size: 25px; margin-right: 10px;"></i>
                @endif
                <span class="text-muted" style="font-size: 15px; margin-left: -4px; margin-right: 8px">{{ $item->masyarakatYangMembuat->nama_masyarakat }}</span> 
            </p>
            <label for="judul_pengaduan" class="text-center d-block" style="margin-top: -10px; margin-bottom: 10px; font-size: 19px"><b>{{ $item->judul_pengaduan }}</b></label>
            <div class="card-image">
                <img src="{{ asset('storage/pengaduan/' . $item->foto) }}" alt="Complaint Image" data-bs-toggle="modal" data-bs-target="#complaintDetailModal{{ $item->id_pengaduan }}">
            </div>
            <p class="card-description">{{ \Str::limit($item->isi_pengaduan, 200) }} <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id_pengaduan }}"></a></p>
            
            <div class="d-flex justify-content-between">
                <p class="@if($item->status == 'pending') text-warning @elseif($item->status == 'diverifikasi') text-success @elseif($item->status == 'ditolak') text-danger @endif" style="margin-bottom: -5px; margin-top: -5px">
                    {{ ucfirst($item->status) }}
                </p>
                <p class="text-muted" style="font-size: 14px; margin-bottom: -5px; margin-top: -5px;">
                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}
                </p>
            </div>

            <br>
            @if($item->status == 'pending')
                <div class="button-group d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-info me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_pengaduan }}">
                        <i class='bx bx-edit' style="font-size: 16px; padding: 0; margin: 0"></i>
                    </button>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_pengaduan }}">
                        <i class='bx bx-trash' style="font-size: 16px; padding: 0; margin: 0"></i>
                    </button>
                </div>
            @elseif($item->status == 'ditolak')
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_pengaduan }}">
                        <i class='bx bx-trash' style="font-size: 16px;"></i>
                    </button>
                </div>
            @endif
        </div>
        @include('masyarakat.pengaduan.pengaduan_detail', ['item' => $item])
        @include('masyarakat.pengaduan.pengaduan_edit', ['item' => $item])
        @include('masyarakat.pengaduan.pengaduan_delete', ['item' => $item])
    @endforeach
    @include('masyarakat.edit_masyarakat')

</div>