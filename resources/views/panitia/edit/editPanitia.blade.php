@foreach ($users as $user)
    <div class="modal fade" id="editPanitia{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input class="form-control form-control-sm" name="username" type="text"
                                    placeholder="Ketikan username Anda.." value="{{ $user->username }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input class="form-control form-control-sm" name="name" type="text"
                                    placeholder="Ketikan nama Anda.." value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control form-control-sm" name="email" type="email"
                                    placeholder="Ketikan email Anda.." value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Ubah Pengguna</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
