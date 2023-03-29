<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengaduan Masyarakat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
  font-size: 14px;
}

th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

.row {
  justify-items: self-start
  text-align: center;
}
	</style>
    <img src="https://scalebranding.com/wp-content/uploads/2021/01/P-LATIN.jpg" height="100px"
    align="left"/>
    <br>
    <strong>Laporan Pengaduan Masyarakat</strong>
    </p>
    <br><br><br>
	<center>
		<h5>Laporan Pengaduan Masyarakat</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tanggal Pengaduan</th>
				<th>Isi Laporan</th>
				<th>Tanggapan</th>
				<th>Tanggal Tanggapan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$item->nik ?? ''}}</td>
				<td>{{$item->nama}}</td>
				<td>{{$item->tgl_pengaduan ?? ''}}</td>
				<td>{{$item->isi_laporan ?? ''}}</td>
				<td>{{$item->tanggapan->tanggapan ?? 'Belum di tanggapi'}}</td>
				<td>{{$item->tanggapan->tgl_tanggapan ?? 'Belum di tanggapi'}}</td>
                @if ($item->status == 0)
                <td>Belum di verifikasi</td>
                @else
                <td>{{$item->status ?? ''}}</td>
                @endif
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
