<div class="modal fade" id="editModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id_pengaduan }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $item->id_pengaduan }}">Edit Tanggapan dan Status Pengaduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('petugas.tanggapan.update', ['id_pengaduan' => $pengaduan->id_pengaduan, 'id_tanggapan' => $tanggapan->id_tanggapan]) }}" method="POST">
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
                        <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4" required>{{ $item->tanggapan->isi_tanggapan }}</textarea>
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