<div class="modal fade" id="editMasyarakatModal" tabindex="-1" aria-labelledby="editMasyarakatModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('masyarakat.masyarakat.update', Auth::user()->id_masyarakat) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editMasyarakatModalLabel">Edit Profil Masyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nik" class="form-label"><b>NIK</b></label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ Auth::user()->nik }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_masyarakat" class="form-label"><b>Nama</b></label>
                        <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" value="{{ Auth::user()->nama_masyarakat }}" required>
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
