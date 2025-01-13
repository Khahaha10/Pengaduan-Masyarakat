<div class="modal fade" id="editMasyarakatModal{{ $item->id_masyarakat }}" tabindex="-1" aria-labelledby="editMasyarakatModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('petugas.masyarakat.update', $item->id_masyarakat) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editMasyarakatModalLabel">Edit Profil Masyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nik" class="form-label"><b>NIK</b></label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $item->nik }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_masyarakat" class="form-label"><b>Nama</b></label>
                        <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" value="{{ $item->nama_masyarakat }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telp" class="form-label"><b>No. Telepon</b></label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ $item->telp }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto_profil" class="form-label"><b>Foto Profil</b></label>
                        <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                        @if($item->foto_profil)
                            <div style="text-align: center;">
                                <img src="{{ asset('storage/foto_masyarakat/' . $item->foto_profil) }}" alt="Foto Profil" 
                                    style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px; display: block; margin-left: auto; margin-right: auto;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
                    </div>
                    <div class="form-group mb-3">
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
