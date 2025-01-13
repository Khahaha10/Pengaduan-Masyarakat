<div class="modal fade" id="editModal{{ $item->id_pengaduan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="input-form" action="{{ route('masyarakat.pengaduan.update', $item->id_pengaduan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id_pengaduan }}">Edit Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="judul_pengaduan"><b>Judul Pengaduan</b></label>
                    <input type="text" name="judul_pengaduan" id="judul_pengaduan" value="{{ $item->judul_pengaduan }}" required>
                    <br>
                    <label for="foto"><b>Foto</b></label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <br>
                    <label for="isi_pengaduan"><b>Isi Pengaduan</b></label>
                    <textarea name="isi_pengaduan" id="isi_pengaduan" rows="4" required>{{ $item->isi_pengaduan }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>