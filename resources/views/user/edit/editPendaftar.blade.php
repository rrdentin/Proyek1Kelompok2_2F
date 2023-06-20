@foreach ($pendaftars as $pendaftar)
    <div class="modal fade" id="editPendaftar{{ $pendaftar->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Calon Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pendaftar.update', $pendaftar->id) }}"
                        enctype="multipart/form-data" id="editForm{{ $pendaftar->id }}"
                        onsubmit="event.preventDefault(); confirmUpdate({{ $pendaftar->id }});">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $pendaftar->nik }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Calon Siswa:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $pendaftar->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="pendaftar_jenKel" class="form-label">Jenis Kelamin Calon Siswa:</label>
                            <select class="form-control" id="pendaftar_jenKel" name="pendaftar_jenKel" required>
                                <option value="Laki-laki" {{ $pendaftar->jenKel === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $pendaftar->jenKel === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenjangPend" class="form-label">Jenjang Pendidikan:</label>
                            <select class="form-control" id="jenjangPend" name="jenjangPend" required>
                                <option value="TK" {{ $pendaftar->jenjangPend === 'TK' ? 'selected' : '' }}>TK
                                </option>
                                <option value="Paud" {{ $pendaftar->jenjangPend === 'Paud' ? 'selected' : '' }}>Paud
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" required>{{ $pendaftar->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tempatLahir" class="form-label">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempatLahir" name="tempatLahir"
                                value="{{ $pendaftar->tempatLahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tglLahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tglLahir" name="tglLahir"
                                value="{{ $pendaftar->tglLahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Diri:</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <label for="kk" class="form-label">Foto Kartu Keluarga</label>
                            <input type="file" class="form-control" id="kk" name="kk">
                        </div>
                        <div class="mb-3">
                            <label for="akte" class="form-label">Foto Akte Kelahiran:</label>
                            <input type="file" class="form-control" id="akte" name="akte">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="name_wali" class="form-label">Nama Wali:</label>
                            <input type="text" class="form-control" id="name_wali" name="name_wali"
                                value="{{ $pendaftar->user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="noHp" class="form-label">Nomor Hp Wali:</label>
                            <input type="text" class="form-control" id="noHp" name="noHp"
                                value="{{ $pendaftar->user->noHp }}" required>
                        </div>
                        <!-- Jenis Kelamin User -->
                        <div class="form-group">
                            <label for="user_jenKel">Jenis Kelamin Wali</label>
                            <select class="form-control" id="user_jenKel" name="user_jenKel" required>
                                <option value="Laki-laki"
                                    {{ old('jenKel', $pendaftar->user->jenKel) === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenKel', $pendaftar->user->jenKel) === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary"
                                onclick="confirmUpdate({{ $pendaftar->id }})">Ubah Calon Siswa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script>
    function confirmUpdate(id) {
        if (confirm("Are you sure you want to update this Pendaftar?")) {
            document.getElementById("editForm" + id).submit();
        } else {
            // Reset the success message
            document.getElementById("modalSuccessMessage").style.display = "none";
        }
    }
</script>
