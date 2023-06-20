@foreach ($pengumumans as $pengumuman)
    <div class="modal fade" id="deletePengumuman{{ $pengumuman->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pengumuman.destroy', $pengumuman->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">Apakah Anda yakin ingin menghapus Pengumuman dengan nomor
                            <b>{{ $pengumuman->id }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Hapus Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
