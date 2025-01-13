@foreach ($forum->komentarPadaForum as $comment)
    @if(Auth::user()->id_masyarakat == $comment->id_masyarakat)
        <div class="modal fade" id="editKomentarModal-{{ $comment->id_komentar }}" tabindex="-1" aria-labelledby="editKomentarModalLabel-{{ $comment->id_komentar }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKomentarModalLabel-{{ $comment->id_komentar }}">Edit Komentar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('masyarakat.komentar.update', $comment->id_komentar) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <textarea name="isi_komentar" class="form-control" rows="4" required>{{ $comment->isi_komentar }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach