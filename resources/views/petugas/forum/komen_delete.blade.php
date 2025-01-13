@foreach ($forum->komentarPadaForum as $comment)
    <div class="modal fade" id="deleteKomentarModal-{{ $comment->id_komentar }}" tabindex="-1" aria-labelledby="deleteKomentarModalLabel-{{ $comment->id_komentar }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKomentarModalLabel-{{ $comment->id_komentar }}">Delete Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus komentar ini?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('petugas.komentar.destroy', $comment->id_komentar) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach