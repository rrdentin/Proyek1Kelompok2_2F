@extends('admin.app')
@extends('admin.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pembayaran Dashboard</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filter</h3>
                        <form action="{{ route('pembayaran.dashboard') }}" method="GET" class="box-tools">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Name Wali</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayarans as $pembayaran)
                                <tr>
                                    <td>{{ $pembayaran->pendaftar->name }}</td>
                                    <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                    <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                    <td>
                                        @if ($pembayaran->status === 'bayar')
                                        {{ $pembayaran->jumlah }}
                                        @else
                                        <input type="number" name="jumlah" value="{{ $pembayaran->jumlah }}">
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST"
                                            id="updateForm">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="submitForm()">
                                                <option value="bayar"
                                                    {{ $pembayaran->status === 'bayar' ? 'selected' : '' }}>Bayar
                                                </option>
                                                <option value="verifikasi"
                                                    {{ $pembayaran->status === 'verifikasi' ? 'selected' : '' }}>
                                                    Verifikasi</option>
                                                <option value="invalid"
                                                    {{ $pembayaran->status === 'invalid' ? 'selected' : '' }}>Invalid
                                                </option>
                                                <option value="terbayar"
                                                    {{ $pembayaran->status === 'terbayar' ? 'selected' : '' }}>Terbayar
                                                </option>
                                            </select>
                                            <button type="submit" class="btn btn-primary"
                                                style="display: none;">Update</button>
                                        </form>

                                        <script>
                                            function submitForm() {
                                                document.getElementById("updateForm").submit();
                                            }

                                        </script>

                                    </td>
                                    <td>
                                        <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                            class="btn btn-info">View</a>
                                        <a href="{{ route('pembayaran.print', $pembayaran->id) }}"
                                            class="btn btn-success">Print</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $pembayarans->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@extends('admin.footer')
