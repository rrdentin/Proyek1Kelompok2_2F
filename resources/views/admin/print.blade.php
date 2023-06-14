<!DOCTYPE html>
<html>

<head>
    <title>PDF Pendaftaran</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Bukti Pendaftaran</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Wali</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenjang Pendidikan</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftar as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->name_wali }}</td>
                    <td>{{ $a->jenKel }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->tglLahir }}</td>
                    <td>{{ $a->jenjangPend }}</td>
                    <td>{{ $a->nik }}</td>
                    <td>{{ $a->tempatLahir }}</td>
                    <td>{{ $a->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
