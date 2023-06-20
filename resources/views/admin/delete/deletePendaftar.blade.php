@foreach ($pendaftars as $pendaftar)
    <div class="modal fade" id="deletePendaftar{{ $pendaftar->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pendaftars.destroy', $pendaftar->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">Apakah Anda yakin ingin menghapus Pendaftar dengan nama
                            <b>{{ $pendaftar->name }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Hapus Pendaftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
