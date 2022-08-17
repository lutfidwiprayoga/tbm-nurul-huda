<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan Donasi Buku</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="row">
        <h3>
            <center>Rekapitulasi Donasi Buku</center>
        </h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Donasi</th>
                    <th>Nama Donatur</th>
                    <th>Email Donatur</th>
                    <th>Alamat Donatur</th>
                    <th>No Hp Donatur</th>
                    <th>Tanggal Donasi</th>
                    <th>Judul Buku</th>
                    <th>Jumlah Buku</th>
                    <th>Jenis Buku</th>
                    {{-- <th>Foto Cover</th>
                            <th>Upload Bukti</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($donasi as $i => $row)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $row->nomor_donasi }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ date('l, d F Y', strtotime($row->created_at)) }}</td>
                        <td>{{ $row->judul_buku }}</td>
                        <td>{{ $row->jumlah_buku }}</td>
                        <td>{{ $row->kategori->nama }}</td>
                        {{-- <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}" width="50px">
                                </td>
                                <td><img src="{{ url('upload_bukti/' . $row->upload_bukti) }}" width="50px">
                                </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
