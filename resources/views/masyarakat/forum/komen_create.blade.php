@foreach ($forums as $forum)
<div class="modal fade" id="replyForumModal-{{ $forum->id_forum }}" tabindex="-1" aria-labelledby="replyForumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('masyarakat.komentar.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_forum" value="{{ $forum->id_forum }}">
            <input type="hidden" name="parent_id" value=""> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyForumModalLabel">Reply to Forum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="isi_komentar" class="form-label">Komentarmu</label>
                        <textarea id="isi_komentar" class="form-control" name="isi_komentar" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach