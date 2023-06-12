<div class="modal fade" id="createPengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tgl_pengumuman">Tanggal:</label>
                        <input class="form-control form-control-sm" name="tgl_pengumuman" type="date"
                        required>
                    </div>
                    <div class="form-group">
                        <label for="judul_pengumuman">Judul:</label>
                        <input class="form-control form-control-sm" name="judul_pengumuman" type="text"
                            placeholder="Input judul pengumuman Anda.." required>
                    </div>
                    <div class="form-group">
                        <label for="desc_pengumuman">Deskripsi:</label>
                        <input class="form-control form-control-sm" name="desc_pengumuman" type="text"
                            placeholder="Input deskripsi pengumuman Anda.." required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_pengumuman">Gambar:</label>
                        <input class="form-control form-control-sm" name="gambar_pengumuman" type="file"
                        required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Pengumuman</button>
                </form>
            </div>
        </div>
    </div>
</div>
