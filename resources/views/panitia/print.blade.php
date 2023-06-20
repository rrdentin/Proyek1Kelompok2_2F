<!DOCTYPE html>
<html>

<head>
    <title>PDF Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <h6><a target="_blank"
                    href="https://www.sekolahanaksaleh.sch.id-…n-dompdf-laravel/">www.sekolahanaksaleh.sch.id</a>
        </h5>
    </center>

    <table class='table table-bordered' style="margin-left: -0.2%">
        <thead>
            @php $i=1 @endphp
            <tr>
                <th>No</th>
                <td>{{ $pendaftar->id }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $pendaftar->nik }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $pendaftar->name }}</td>
            </tr>
            <tr>
                <th>Nama Wali</th>
                <td>{{ $pendaftar->name_wali }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftar->jenKel }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pendaftar->alamat }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pendaftar->tglLahir }}</td>
            </tr>
            <tr>
                <th>Jenjang Pendidikan</th>
                <td>{{ $pendaftar->jenjangPend }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $pendaftar->tempatLahir }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $pendaftar->status }}</td>
            </tr>
        </thead>
    </table>
</body>

</html>
