@foreach ($users as $user)
<div class="modal fade" id="deleteAdmin{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">Apakah Anda yakin ingin menghapus User dengan nama <b>{{$user->name}}</b>?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-danger">Hapus Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach