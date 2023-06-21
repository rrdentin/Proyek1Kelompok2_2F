<!DOCTYPE html>
<html>

<head>
    <title>PDF Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row justify-content-center align-items-center">
        <table border="0" width="100%" style="text-align:center;">
            <tbody>
                <tr>
                    <td align="left"><img src="dist/img/Logo Shaleh.png" width="130px"
                            alt="Logo Shaleh"></td>
                    <td align="center" width="150%">
                        <div>
                            <span style="font-family: 'Times New Roman'; font-size:16pt">YAYASAN ANAK SHALEH</span><br>
                            <span style="font-family: 'Times New Roman'; font-size:16pt"><strong>TK | PAUD ANAK SHALEH</strong></span><br>
                            <span style="font-family: 'Times New Roman'; font-size:14pt">Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65143</span><br>
                            <h6><a target="_blank"
                                href="https://www.sekolahanaksaleh.sch.id-…n-dompdf-laravel/">www.sekolahanaksaleh.sch.id</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="height:10px; border:0; border-top:3px double #000000">
        <div style="text-align: center">
            <h3>Detail Pendaftaran</h3><br>
        </div>


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
