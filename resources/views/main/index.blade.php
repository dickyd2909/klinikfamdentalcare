@extends('main.layout.main')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
                <div class="container">
                    <h2>Welcome to <span>Family Dental Care</span></h2>
                    <p></p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
                <div class="container">
                    <h2>Welcome to <span>Family Dental Care</span></h2>
                    <p></p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
                <div class="container">
                    <h2>Welcome to <span>Family Dental Care</span></h2>
                    <p></p>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>Dalam keadaan darurat? Butuh bantuan?</h3>
                <p> Pasien yang akan melakukan konsultasi atau tindakan silahkan melakukan Appointment dibawah ini!
                    </p>
                <a class="cta-btn scrollto" href="/appointment">Make an Appointment</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            
            <div class="section-title">
                <h2>Family Dental Care</h2>
                <p>{!! html_entity_decode($tentang -> informasi_umum) !!}</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('main/img/logo/'.$tentang -> foto_sampul) }}" class="img-fluid" alt="" height="100%" width="100%">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Visi</h3>
                    <p class="fst-italic">
                        {!! html_entity_decode($tentang -> visi) !!}
                    </p>
                    <h3>Misi</h3>
                    <ul>
                        {!! html_entity_decode($tentang -> misi) !!}
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Family Dental Care memiliki beberapa layanan perawatan gigi, segera atasi masalah gigi anda dengan melakukan konsultasi terlebih dahulu di Family Dental Care.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-hospital-user"></i></div>
                    <h4 class="title"><a href="">Konsultasi</a></h4>
                    <p class="description">Kontrol rutin bermanfaat untuk memelihara kesehatan gigi dan mulut, mendeteksi masalah gigi sejak dini, 
                        sehingga memberikan penanganan yang tepat dan akurat untuk menghindari kondisi yang terlanjur parah.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-teeth"></i></div>
                    <h4 class="title"><a href="">Penambalan Gigi</a></h4>
                    <p class="description">Prosedur penambalan gigi bertujuan untuk mengembalikan bentuk dan fungsi gigi yang rusak atau berlubang.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fas fa-teeth-open"></i></div>
                    <h4 class="title"><a href="">Pencabutan Gigi</a></h4>
                    <p class="description">Family Dental Care menyediakan pelayanan pencabutan gigi yang merupakan prosedur untuk mencabut gigi yang bermasalah dan tidak bisa diperbaiki lagi dari gusi.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-xmarks-lines"></i></div>
                    <h4 class="title"><a href="">Pemasangan Kawat Gigi</a></h4>
                    <p class="description">Pemasangan kawat gigi atau behel adalah prosedur untuk memperbaiki susunan gigi yang tidak rapi atau posisi rahang yang tidak normal.
                        Family Dental Care menyediakan pelayanan pemasangan kawat gigi untuk perbaikan gigi dan rahang.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-wand-magic-sparkles"></i></div>
                    <h4 class="title"><a href="">Pembersihan Karang Gigi</a></h4>
                    <p class="description">Segera atasi gusi berdarah serta bau mulut tidak sedap dengan perawatan pembersihan karang gigi atau Scaling di Family Dental Care.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-spray-can-sparkles"></i></div>
                    <h4 class="title"><a href="">Bleaching</a></h4>
                    <p class="description">Family Dental Care menyediakan pelayanan bleaching gigi atau dental whitening yang bertujuan untuk mengembalikan estetika gigi dan mendapatkan warna cerah pada gigi.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-stethoscope"></i></div>
                    <h4 class="title"><a href="">Bedah Minor</a></h4>
                    <p class="description">Bedah minor merupakan prosedur pencabutan gigi dengan menggunakan anestesi lokal yang dilakukan untuk pengambilan gigi geraham bungsu yang tumbuhnya miring, 
                        Gigi yang memiliki kelainan kondisi, ataupun penghalusan penonjolan tulang yang mengganggu.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h4 class="title"><a href="">Tambal Estetik</a></h4>
                    <p class="description">Tambal estetik merupakan prosedur penambalan gigi berlubang yang dilakukan dengan bahan laser.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-face-grimace"></i></div>
                    <h4 class="title"><a href="">Perawatan Gigi Anak</a></h4>
                    <p class="description">Memelihara kesehatan gigi dan mulut sejak usia dini dengan baik akan membantu menjaga kesehatan gigi dan gusi sepanjang hidup mereka.
                        Family Dental Care menyediakan pelayanan perawatan gigi mulai dari bayi, anak-anak, serta remaja supaya kunjungan ke Dokter Gigi dan perawatan gigi menjadi proses yang menyenangkan.</p>
                </div>
                <div class="col-lg-4 col-md-6 align-items icon-box" data-aos="zoom-in" data-aos-delay="100">
                </div>
                <div class="col-lg-4 col-md-6 align-items icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-tooth"></i></div>
                    <h4 class="title"><a href="">Gigi Tiruan</a></h4>
                    <p class="description">Family Dental Care menyediakan pelayanan implan gigi yang merupakan pilihan treatment terbaik untuk menggantikan gigi yang hilang karena fitur serta kemiripannya dengan gigi asli.</p>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Doctors</h2>
            </div>

            <div class="row">
                @foreach ($dokter as $data)
                <div class="col-lg-3 col-md-6 d-flex align-items">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                            <img src="{{ asset('img/dokter/'.$data -> images) }}" class="img-fluid"  >
                            </div>
                            <div class="member-info">
                                <h4>{{ $data -> nama_dokter }}</h4>
                                <p>----------------------------------------</p>
                                <h4>Jadwal : {{ $data -> jadwal_dokter }}</h4>
                                <span> </span>
                            </div>
                        </div>   
                </div>
                @endforeach
            </div>
    </section>
    <!--End Doctors Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                
            </div>
            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($galeri as $data)
                    <div class="swiper-slide"><a class="gallery-lightbox"><img
                         src="{{ asset('/img/gallery/'.$data -> images) }}" class="img-fluid" alt="" ></a>
                         <h4>{{ $data -> judul }}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Location & Contact</h2>
            </div>

        </div>

        <div>
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://maps.google.com/maps?q=family%20dental%20care&t=&z=13&ie=UTF8&iwloc=&output=embed"
                frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container">

            <div class="row mt-5">

                <div class="col-lg">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>Jl. Leuwi Panjang No.52a, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat
                                40234</p>
                                <div class="info-box mt-4">
                                    <a href="https://www.google.com/maps/dir//Jl.+Leuwi+Panjang+No.52a,+Situsaeur,+Kec.
                                    +Bojongloa+Kidul,+Kota+Bandung,+Jawa+Barat+40234/@-6.9407825,107.5264023,12z/data
                                    =!4m8!4m7!1m0!1m5!1m1!1s0x2e68e8bd6cd8c397:0x1d7b143e603986b2!2m2!1d107.5964429!2d-6.9407876" 
                                    class="appointment-btn scrollto"><span class="d-none d-md-inline">G</span>O</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>fdcbandung52@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>085266379191</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection