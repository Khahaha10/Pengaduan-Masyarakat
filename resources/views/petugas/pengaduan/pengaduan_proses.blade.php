<div class="modal fade" id="pengaduanProses{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="pengaduanProsesLabel{{ $item->id_pengaduan }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    @if ($item->masyarakatYangMembuat->foto_profil)
                        <img src="{{ asset('storage/foto_masyarakat/' . $item->masyarakatYangMembuat->foto_profil) }}" alt="Foto Masyarakat" 
                            style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                    @else
                        <i class="bx bx-user-circle" style="font-size: 30px; margin-right: 10px;"></i>
                    @endif
                    <span class="" style="font-size: 16px;">{{ $item->masyarakatYangMembuat->nama_masyarakat }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <label for="judul_pengaduan" class="text-center d-block" style="margin-top: 10px; margin-bottom: 20px; font-size: 28px"><b>{{ $item->judul_pengaduan }}</b></label>

                <hr>

                <div class="text-center mb-3">
                    @if ($item->foto)
                        <img src="{{ asset('storage/pengaduan/' . $item->foto) }}" alt="Complaint Image" style="max-width: 80%; height: auto;">
                    @else
                        <img src="image-placeholder.png" alt="Complaint Image" style="max-width: 80%; height: auto;">
                    @endif
                </div>
                <div style="padding: 20px">
                    <p class="card-description">{{$item->isi_pengaduan}}</p>

                    <div class="d-flex justify-content-between mt-4 mb-1">
                        <p class="@if($item->status == 'pending') text-warning @elseif($item->status == 'diverifikasi') text-success @elseif($item->status == 'ditolak') text-danger @endif" style="margin-bottom: -5px; margin-top: -5px; font-size: 16px">
                            {{ ucfirst($item->status) }}
                        </p>
                        <p class="text-muted" style="font-size: 16px; margin-bottom: -5px; margin-top: -5px;">
                            {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <hr class="my-4" style="border-width: 2px;">

                    <h5>Tanggapan Petugas:</h5>
                    <br>

                    <form action="{{ route('petugas.tanggapan.store', $item->id_pengaduan) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="status">Update Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" @if($item->status == 'pending') selected @endif>Pending</option>
                                <option value="diverifikasi" @if($item->status == 'diverifikasi') selected @endif>Diverifikasi</option>
                                <option value="ditolak" @if($item->status == 'ditolak') selected @endif>Ditolak</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="tanggapan">Tanggapan Petugas</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Kirim Tanggapan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
