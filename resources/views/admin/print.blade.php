<!DOCTYPE html>
<html>
<head>
	<title>PDF Pendaftaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Bukti Pendaftaran</h4>
		<h6><a target="_blank" href="https://www.sekolahanaksaleh.sch.id-…n-dompdf-laravel/">www.sekolahanaksaleh.sch.id</a></h5>
	</center>

	<table class='table table-bordered' style="margin-left: -1%">
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
			@php $i=1 @endphp
                <tr>
                    <td>{{ $pendaftar->id }}</td>
                    <td>{{ $pendaftar->name }}</td>
                    <td>{{ $pendaftar->name_wali }}</td>
                    <td>{{ $pendaftar->jenKel }}</td>
                    <td>{{ $pendaftar->alamat }}</td>
                    <td>{{ $pendaftar->tglLahir }}</td>
                    <td>{{ $pendaftar->jenjangPend }}</td>
                    <td>{{ $pendaftar->nik }}</td>
                    <td>{{ $pendaftar->tempatLahir }}</td>
                    <td>{{ $pendaftar->status }}</td>
                </tr>
        </tbody>
    </table>
</body>

</html>