@extends('donatur.layouts.app')
@section('frontend')
    <div class="banner">
        <div class="container">
            <h1 class="font-weight-semibold">Selamat Datang di <br>Taman Baca Masyarakat Nurul Huda<br>Desa Langring
            </h1>
            <h6 class="font-weight-normal text-muted pb-3">Ayo berbagi ilmu dan pengalamanmu membaca ke mereka yang
                belum berkesempatan sama dengan Donasi Buku.
            </h6>
            <img src="{{ asset('frontend') }}/images/donate.png" width="800px" class="img-fluid">
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="content-header">
                    <h2>Cari Donasi Anda</h2>
                    <form action="{{ route('donasi.cari') }}" class="search nav-form" method="GET">
                        @csrf
                        <input type="text" class="form-control" name="cari" id="cariDonasi"
                            placeholder="Cek Status Donasi" style="width: 90%; float: left;">
                        <button class="btn btn-success" style="padding: 6px 20px">Cari</button>
                    </form>
                </div>


                <div class="container">
                    <div class="col-12 text-center pb-5">
                        <h3 >Tentang Kami</h3>
                        <img src="{{ asset('frontend') }}/images/tb.png" width="800px" class="img-fluid">
                            <p class="py-4 m-0 text-muted">Pendidikan adalah alat utama bagi manusia untuk meningkatkan standar hidup mereka. Dengan pendidikan, manusia dapat bekerja, meningkatkan ekonomi, dan berpartisipasi dalam lingkungan sosial. Dalam mendukung program pendidikan untuk masyarakat yang adil, pemerintah menyediakan jalur pendidikan nonformal dan informal melalui pengembangan pusat pendidikan non-formal dan informal serta perpustakaan umum. Taman Bacaan Masyarakat atau dikenal dengan singkatan TBM adalah perpustakaan skala kecil yang dikenal sebagai sudut baca, rumah baca, rumah pintar, dan sebagainya. Dalam petunjuk teknis TBM yang dikeluarkan oleh Kementerian Pendidikan dan Kebudayaan, TBM adalah lembaga yang mempromosikan kebiasaan membaca yang menyediakan ruang untuk membaca, berdiskusi, membaca buku, menulis, dan kegiatan serupa lainnya, yang dilengkapi dengan bahan bacaan, seperti buku, majalah, tabloid, surat kabar, komik, dan materi multimedia lainnya, dan didukung oleh sumber daya manusia yang bertindak sebagai motivator.</p>
                            <p class="font-weight-medium text-muted">Taman Baca Masyarakat Nurul Huda merupakan  salah satu contoh TBM yang ada di Indonesia, Taman Baca Masyarakat Nurul Huda adalah kegiatan desa binaan Mapala Poliwangi yang ada di Kabupaten Banyuwangi, Jawa Timur. Tepatnya di Dusun Langring Desa Jambesari, Kecamatan Giri. Berdiri pada tahun 2019 hingga saat ini. Taman Baca Masyarakat Nurul Huda banyak menyelenggarakan berbagai kegiatan dalam meningkatkan minat baca anak di lingkungan sekitar dengan konsep sekolah alam.  Salah satunya yaitu dengan cara Pendampingan Belajar (Pendar) dan Dongeng. Kegiatan Taman Baca Masyarakat Nurul Huda dilakukan secara continue, sehingga dapat mengontrol perkembangan pada anak di setiap kegiatan. Kegiatan mengajar pada Taman Baca Masyarakat Nurul Huda ini dilakukan satu bulan 2 kali yaitu setiap hari Minggu  mulai dari jam 08.00 sampai 12.00.</p>
                    </div>
                </div>

            <section class="case-studies" id="case-studies-section">
                <div class="row grid-margin">
                    <div class="col-12 text-center pb-5">
                        <h2>Kegiatan Kami</h2>
                            <h6 class="section-subtitle text-muted">Taman Baca Masyarakat Nurul Huda</h6>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-primary text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('frontend') }}/images/gb1.jpeg"
                                            class="case-studies-card-img" alt="">
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <!-- <h6 class="m-0 pb-1">Online Marketing</h6> -->
                                    <p>Belajar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-warning text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('frontend') }}/images/gb5.jpeg"
                                            class="case-studies-card-img" alt="">
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <!-- <h6 class="m-0 pb-1">Web Development</h6> -->
                                    <p>Outdor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-violet text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('frontend') }}/images/gb3.jpeg"
                                            class="case-studies-card-img" alt="">
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <!-- <h6 class="m-0 pb-1">Web Designing</h6> -->
                                    <p>Makan Bersama</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('frontend') }}/images/gb4.jpeg"
                                            class="case-studies-card-img" alt="">
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <!-- <h6 class="m-0 pb-1">Software Development</h6> -->
                                    <p>Menggambar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-12 text-center pb-5">
                <h2>Cara Donasi</h2>
            </div> 
                <div class="d-md-flex justify-content-between">

                    <div class="grid-margin d-flex justify-content-start">
                        <div class="features-width">
                            <img src="{{ asset('frontend') }}/images/Group12.svg" alt="" class="img-icons">
                            <h5 class="py-3">Langkah<br>Pertama</h5>
                            <p class="text-muted">syarat sebelum melakukan donasi yaitu:pertama buku dalam keadaan baik dan layak baca, kedua buku milik pribadi dan ketiga buku tidak mengandung unsur sara.Untuk berdonasi buku di Taman Baca Masyarakat Nurul Huda anda hanya perlu membuka
                            menu DONATE NOW untuk menuju halaman Form Donation
                            </p>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-center">
                        <div class="features-width">
                            <img src="{{ asset('frontend') }}/images/Group7.svg" alt="" class="img-icons">
                            <h5 class="py-3">Langkah<br>Kedua</h5>
                            <p class="text-muted">Lengkapi data-data Form Donation untuk melakukan donasi. Jika sudah tekan tombol submit
                                dan anda akan menuju halaman Verifikasi. (Jangan lupa  menyimpan Nomor Donasi untuk mengetahui status buku anda.
                            </p>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-end">
                        <div class="features-width">
                            <img src="{{ asset('frontend') }}/images/Group5.svg" alt="" class="img-icons">
                            <h5 class="py-3">Langkah<br>Ketiga</h5>
                            <p class="text-muted">Setelah data anda diverifikasi, anda diminta untuk mengupload bukti (Resi Pengiriman)
                                dan status pemesanan anda akan berubah menjadi "Dikirim". Setelah buku diterima oleh admin maka status pemesanan
                                anda berubah menjadi "Sudah Diterima"
                            </p>
                        </div>
                    </div>
                </div>
            </section>

           
        </div>
    </div>
@endsection
