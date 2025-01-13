<div class="modal fade" id="editForumModal-{{ $forum->id_forum }}" tabindex="-1" aria-labelledby="editForumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('masyarakat.forum.update', $forum->id_forum) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editForumModalLabel">Edit Forum Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $forum->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi_forum" class="form-label">Isi</label>
                        <textarea id="isi_forum" class="form-control" name="isi_forum" rows="5" required>{{ $forum->isi_forum }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>