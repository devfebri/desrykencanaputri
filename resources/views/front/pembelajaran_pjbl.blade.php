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
                <h1 class="display-3 text-white animated slideInDown">Pembelajaran PjBL</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Pembelajaran PjBL</li>

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
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('master/img/about.jpg') }}" alt="" style="object-fit: cover;">

                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Pembelajaran PjBL</h6>
                <h1 class="mb-4">Apa itu Pembelajaran PjBL ?</h1>
                <p class="mb-4">Project-Based Learning (PjBL) adalah metode pembelajaran yang berfokus pada
                    pengembangan keterampilan melalui proyek nyata. Dalam PjBL, siswa tidak hanya
                    mempelajari teori, tetapi juga menerapkannya secara langsung melalui proyek yang
                    relevan dengan kehidupan nyata. Proses ini melibatkan penelitian, perencanaan,
                    pelaksanaan, dan evaluasi proyek oleh siswa. Pembelajaran ini dirancang untuk
                    mendorong siswa bekerja secara kolaboratif, berpikir kritis, serta mengembangkan
                    kemampuan problem-solving. Dengan demikian, PjBL memberikan kesempatan bagi
                    siswa untuk belajar secara mendalam dan mengintegrasikan berbagai konsep yang
                    telah mereka pelajari. Selain itu, PjBL menempatkan siswa sebagai pusat dari proses
                    pembelajaran. Guru berperan sebagai fasilitator yang membimbing dan memberikan
                    arahan selama proses berlangsung. PjBL juga menekankan pentingnya interaksi
                    sosial, di mana siswa bekerja dalam kelompok untuk mencapai tujuan bersama.
                    Metode ini efektif dalam meningkatkan motivasi belajar siswa karena mereka merasa
                    terlibat secara langsung dalam proses pembelajaran dan dapat melihat hasil nyata
                    dari usaha mereka. Hasil akhirnya tidak hanya pengetahuan teoritis, tetapi juga
                    keterampilan praktis yang sangat dibutuhkan dalam kehidupan sehari-hari dan dunia
                    kerja.</p>
                {{-- <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection

