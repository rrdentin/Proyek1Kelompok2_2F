<div class="modal fade" id="createGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori_galeri">Kategori:</label>
                            <select class="form-control" name="kategori_galeri" required>
                                <option value="TK">TK</option>
                                <option value="Paud">Paud</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_galeri">Keterangan:</label>
                            <input class="form-control form-control-sm" name="keterangan_galeri" type="text"
                                placeholder="Ketikan keterangan galeri Anda.." required>
                        </div>
                        <div class="form-group">
                            <label for="gambar_galeri">Gambar:</label>
                            <input class="form-control form-control-sm" name="gambar_galeri" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Gallery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
