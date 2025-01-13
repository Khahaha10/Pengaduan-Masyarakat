<div class="col-md-4 complaint-list" style="margin-left: -328px">
    <h3>Pengaduan yang Sudah Ditanggapi</h3>
    @foreach ($pengaduanTanggapan as $item)
        <div class="complaint-card">
            <h5 class="text-center"><b>{{ $item->judul_pengaduan }}</b></h5>
            <div class="card-image">
                <img src="{{ asset('storage/pengaduan/' . $item->foto) }}" alt="Foto Pengaduan" class="card-image">
            </div>
            <p style="font-size: 14px;">{{ \Str::limit($item->isi_pengaduan, 200) }}</p>
    
            <div class="d-flex justify-content-between" style="font-size: 14px;">
                <p class="@if($item->status == 'diverifikasi') text-success @else text-danger @endif">
                    {{ ucfirst($item->status) }}
                </p>
                <p class="text-muted">
                    {{ $item->updated_at->format('d M Y, H:i') }}
                </p>
            </div>

    
            <div class="d-flex justify-content-end mt-0">
                @if($item->status == 'diverifikasi')
                    <a href="{{ route('petugas.pengaduan.cetak', ['id_pengaduan' => $item->id_pengaduan]) }}" class="btn btn-outline-warning btn-sm me-2" target="_blank">
                        <i class='bx bx-printer' style="font-size: 16px; padding: 0; margin: 0;"></i> Print
                    </a>
                @endif
                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_pengaduan }}">
                    <i class='bx bx-edit' style="font-size: 16px; padding: 0; margin: 0;"></i>
                </button>

                @if(auth()->user()->role != 'petugas')
                    <button type="button" class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_pengaduan }}">
                        <i class='bx bx-trash' style="font-size: 16px; padding: 0; margin: 0;"></i>
                    </button>
                @endif
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id_pengaduan }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id_pengaduan }}">Hapus Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('petugas.pengaduan.destroy', ['id_pengaduan' => $item->id_pengaduan]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus pengaduan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id_pengaduan }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id_pengaduan }}">Edit Tanggapan dan Status Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('petugas.tanggapan.update', ['id_pengaduan' => $item->id_pengaduan,'id_tanggapan' => $item->tanggapan->first()->id_tanggapan ?? null]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Pengaduan</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="diverifikasi" @if($item->status == 'diverifikasi') selected @endif>Diverifikasi</option>
                                    <option value="ditolak" @if($item->status == 'ditolak') selected @endif>Ditolak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggapan" class="form-label">Tanggapan</label>
                                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4" required>{{ $item->tanggapan->first()->isi_tanggapan ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

    @include('petugas.edit_petugas')
</div>