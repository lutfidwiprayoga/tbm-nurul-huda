@component('mail::message')
    # Dear {{ $data['nama'] }}

    Terima Kasih Atas Donasi Buku anda
    Bersama ini konfirmasi Data Donasi Buku anda sebagai berikut :<br>
    Kode Donasi     : {{ $data['nomor_donasi'] }}</th>
    Tanggal Donasi  : {{ $data['created_at'] }}
    Nama Donatur    : {{ $data['nama'] }}
    Email Donatur   : {{ $data['email'] }}
    No Hp Donatur   : {{ $data['no_hp'] }}
    Jumlah Buku     : {{ $data['jumlah_buku'] }}
    Judul Buku      : {{ $data['judul_buku'] }}
    Jenis Buku      : {{ $data['jenis_buku'] }}<br>
    Thanks,
    TBM Nurul Huda Desa Langring Jambesari Giri Banyuwangi
@endcomponent
