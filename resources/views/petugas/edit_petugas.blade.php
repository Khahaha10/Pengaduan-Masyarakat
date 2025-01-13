<div class="modal fade" id="editPetugasModal" tabindex="-1" aria-labelledby="editPetugasModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('petugas.petugas.update', Auth::user()->id_petugas) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPetugasModalLabel">Edit Profil Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_petugas" class="form-label"><b>Nama</b></label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ Auth::user()->nama_petugas }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telp" class="form-label"><b>No. Telepon</b></label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ Auth::user()->telp }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto_profil" class="form-label"><b>Foto Profil</b></label>
                        <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                    </div>
                    <div class="form-group mb-3">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                        <label for="password" class="form-label"><b>Password Baru</b></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru (opsional)">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label"><b>Konfirmasi Password Baru</b></label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
