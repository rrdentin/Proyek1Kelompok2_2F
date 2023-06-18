@foreach ($gallery as $galeri)
<div class="modal fade" id="editGallery{{ $galeri->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('gallery.update', $galeri->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kategori_galeri">Kategori:</label>
                        <input class="form-control form-control-sm" name="kategori_galeri" type="text"
                        value="{{ $galeri->kategori_galeri }}" placeholder="Input kategori galeri Anda.." required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_galeri">Keterangan:</label>
                        <input class="form-control form-control-sm" name="keterangan_galeri" type="text"
                        value="{{ $galeri->keterangan_galeri }}" placeholder="Input keterangan galeri Anda.." required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_galeri">Gambar:</label>
                        <img src="{{ asset("storage/gallery/$galeri->gambar_galeri") }}" width= '50' height='50' class="img img-responsive"/>
                        <input class="form-control form-control-sm" name="gambar_galeri" type="file"
                        value="{{ $galeri->gambar_galeri }}">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Gallery</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach