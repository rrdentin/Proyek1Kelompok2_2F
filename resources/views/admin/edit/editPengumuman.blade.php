@foreach ($pengumumans as $pengumuman)
    <div class="modal fade" id="editPengumuman{{ $pengumuman->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pengumuman.update', $pengumuman->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_pengumuman">Tanggal:</label>
                                <input class="form-control form-control-sm" name="tgl_pengumuman" type="date"
                                    value="{{ $pengumuman->tgl_pengumuman }}" required>
                            </div>
                            <div class="form-group">
                                <label for="judul_pengumuman">Judul:</label>
                                <input class="form-control form-control-sm" name="judul_pengumuman" type="text"
                                    placeholder="Ketikan judul pengumuman Anda.."
                                    value="{{ $pengumuman->judul_pengumuman }}" required>
                            </div>
                            <div class="form-group">
                                <label for="desc_pengumuman">Deskripsi:</label>
                                <textarea class="form-control" rows="3" class="form-control form-control-sm" name="desc_pengumuman" type="text"
                                    placeholder="Ketikan deskripsi pengumuman Anda.." required>{{ $pengumuman->desc_pengumuman }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar_pengumuman">Gambar:</label>
                                <br>
                                <img src="{{ asset("storage/pengumuman/$pengumuman->gambar_pengumuman") }}"
                                    width='50' height='50' class="img img-responsive" />
                                <input class="form-control form-control-sm" name="gambar_pengumuman" type="file"
                                    value="{{ $pengumuman->gambar_pengumuman }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Ubah Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
