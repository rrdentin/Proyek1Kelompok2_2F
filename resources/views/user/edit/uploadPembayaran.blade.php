@foreach ($pembayarans as $pembayaran)
    <div class="modal fade" id="uploadPembayaran{{ $pembayaran->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input id="pendaftar_id" type="hidden" class="form-control" name="pendaftar_id"
                            value="{{ old('pendaftar_id', $pembayaran->pendaftar_id) }}" required autofocus>

                        <div class="form-group">
                            @if ($pembayaran->pendaftar->jenjangPend == 'TK')
                                <img src="/ppdb/TK.png" alt="" width="465px" height="550px">
                            @else
                                <img src="/ppdb/Paud.png" alt="" width="465px" height="550px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="bukti_pembayaran">{{ __('Bukti Pembayaran') }}</label>
                            <input id="bukti_pembayaran" type="file" class="form-control" name="bukti_pembayaran"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Upload Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
