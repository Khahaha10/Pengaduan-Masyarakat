<div class="modal fade" id="deleteForumModal-{{ $forum->id_forum }}" tabindex="-1" aria-labelledby="deleteForumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('masyarakat.forum.destroy', $forum->id_forum) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteForumModalLabel">Delete Forum Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus forum topik ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>