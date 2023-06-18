<div class="modal fade" id="createPendaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pendaftar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            placeholder="Ketikan nik calon siswa.." required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Calon Siswa:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ketikan nama calon siswa.." required>
                    </div>
                    <div class="mb-3">
                        <label for="pendaftar_jenKel" class="form-label">Jenis Kelamin Calon Siswa:</label>
                        <select class="form-control" id="pendaftar_jenKel" name="pendaftar_jenKel" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenjangPend" class="form-label">Jenjang Pendidikan:</label>
                        <select class="form-control" id="jenjangPend" name="jenjangPend" required>
                            <option value="TK">TK</option>
                            <option value="Paud">Paud</option>
                        </select>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Ketikan alamat calon siswa.."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tempatLahir" class="form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempatLahir" name="tempatLahir"
                            placeholder="Ketikan tempat lahir calon siswa.." required>
                    </div>
                    <div class="mb-3">
                        <label for="tglLahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tglLahir" name="tglLahir" required>
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
                            value="{{ Auth::user()->name }}" readonly="readonly" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="form-label">Nomor Hp Wali:</label>
                        <input type="text" class="form-control" id="noHp" name="noHp"
                            value="{{ Auth::user()->noHp }}" readonly="readonly" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_jenKel" class="form-label">Jenis Kelamin Wali:</label>
                        <input class="form-control form-control-sm" id="user_jenKel" name="user_jenKel"
                            type="text" value="{{ Auth::user()->jenKel }}" readonly="readonly" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Calon Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
