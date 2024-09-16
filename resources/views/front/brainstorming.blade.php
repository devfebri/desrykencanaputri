@extends('front.master')
@section('contentfront')

<!-- Service Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Skilled Instructors</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">Online Classes</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">Home Projects</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Book Library</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Service End -->

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Brainstorming</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Brainstorming</li>


                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('master/img/cat-4.jpg') }}" alt="" style="object-fit: cover;">

                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Dampak</h6>
                <h1 class="mb-4">Brainstorming</h1>

                <p class="mb-4">Brainstorming adalah teknik kreatif yang digunakan untuk menghasilkan ide-ide atau
                    solusi inovatif dalam menyelesaikan masalah atau mengembangkan konsep. Proses
                    brainstorming melibatkan pengumpulan spontan dari berbagai ide oleh individu atau
                    kelompok tanpa adanya penilaian atau kritik pada tahap awal. Tujuan utamanya
                    adalah untuk mendorong aliran bebas ide, memungkinkan setiap peserta untuk
                    menyampaikan pemikiran mereka secara terbuka, sehingga muncul beragam
                    perspektif yang dapat memperkaya solusi akhir. Teknik ini sering digunakan dalam
                    diskusi kelompok di mana setiap anggota didorong untuk berkontribusi, tanpa takut
                    ide mereka dianggap tidak relevan atau salah.
                    Dalam brainstorming, semua ide yang muncul dicatat dan dipertimbangkan tanpa
                    pengecualian, dan setelah tahap awal pengumpulan ide selesai, barulah dilakukan
                    evaluasi untuk menyaring dan mengembangkan ide-ide terbaik. Proses ini
                    memungkinkan tim untuk mengeksplorasi berbagai kemungkinan dan menemukan
                    solusi yang mungkin tidak terpikirkan sebelumnya. Brainstorming efektif dalam
                    mendorong kreativitas dan inovasi, karena suasana yang terbuka dan bebas dari kritik
                    membantu menghilangkan hambatan psikologis yang sering kali menghalangi
                    pemikiran kreatif. Pada akhirnya, brainstorming dapat menghasilkan solusi yang lebih
                    kaya dan lebih baik dibandingkan metode pemecahan masalah yang lebih terstruktur</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection

