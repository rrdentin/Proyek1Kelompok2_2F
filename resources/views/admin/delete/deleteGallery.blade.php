@foreach ($gallery as $galeri)
    <div class="modal fade" id="deleteGallery{{ $galeri->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('gallery.destroy', $galeri->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">Apakah Anda yakin ingin menghapus Galeri dengan nomor
                            <b>{{ $galeri->id }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Hapus Galeri</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
