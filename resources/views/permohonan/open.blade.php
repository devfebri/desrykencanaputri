@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">


        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    {{-- <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item active">Sart</li>
                        </ol>
                    </div> --}}
                    {{-- <h4 class="page-title">Satyalancana Karya Satya</h4> --}}
                    <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    @if(auth()->user()->role=='admin' && $data->status!=4)
                    @if($data->jenis=='Cuti Tahunan'||$data->jenis=='Izin Menikah'||$data->jenis=='Izin Lainnya')
                    @php
                    //date now
                    $yearnow=Carbon\Carbon::now()->format('Y');
                    $monthnow=Carbon\Carbon::now()->format('m');
                    $daynow=Carbon\Carbon::now()->format('d');
                    $datenow=Carbon\Carbon::now()->format('Y-m-d');
                    //string to date
                    $jadwal=explode(',',$data->jadwalcuti);
                    $time=strtotime($jadwal[0]);
                    //date cuti
                    $year = date('Y',$time);
                    $month = date('m',$time);
                    $day = date('d',$time);
                    $date = date('Y-m-d',$time);
                    @endphp
                    @if(Carbon\Carbon::now()->between($date, $datenow))
                    <a href="{{ route('admin_cutipembatalan',['id'=>$data->id]) }}" class="btn btn-danger float-right" onclick="return confirm('Apakah anda yakin ingin membatalkan cuti ini ???')">Batalkan Cuti</a>
                    @endif
                    @else
                    @php

                    $datenow=Carbon\Carbon::now()->format('Y-m-d');
                    $date=$data->dari_tanggal->format('Y-m-d');

                    @endphp
                    @if(Carbon\Carbon::now()->between($date, $datenow))
                    <a href="{{ route('admin_cutipembatalan',['id'=>$data->id]) }}" class="btn btn-danger float-right" onclick="return confirm('Apakah anda yakin ingin membatalkan cuti ini ???')">Batalkan Cuti</a>
                    @endif
                    @endif
                    @endif
                    {{-- <a href="#" class="btn btn-danger float-right" >Ubah Tanggal Cuti</a> --}}

                    {{-- sering di ubah Febri --}}
                    {{-- <a href="{{ route('admin_cutipembatalan',['id'=>$data->id]) }}" class="btn btn-danger float-right" onclick="return confirm('Apakah anda yakin ingin membatalkan cuti ini ???')">Batalkan Cuti</a> --}}
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="row text-center" style="font-size: 12px;">
                        <div class="col-lg-3 col-md-6 col-sm-12" @if($data->persetujuan_karu==2) style="background-color: rgb(89, 255, 89);" @elseif($data->persetujuan_karu==3) style="background-color: rgb(89, 255, 89);" @endif>
                            <div class="card-body">
                                <b>KARU</b> <br>
                                @if($user->pegawai_karu_id!=null)
                                {{ App\Models\User::find($user->pegawai_karu_id)->name }} <br>
                                @if($data->persetujuan_karu==1)
                                <span class="badge badge-pill badge-primary"><b><i>Diajukan</i></b></span>
                                @elseif($data->persetujuan_karu==2)
                                <span class="badge badge-pill badge-success"><b><i>Menyetujui</i></b> </span>
                                <p><i>{{ $data->updated_karu }} <br> {{ $data->keterangan_karu }}</i></p>
                                @elseif($data->persetujuan_karu==3)
                                <span class="badge badge-pill badge-danger"><b><i>Tidak Menyetujui</i></b></span>
                                <p><i>{{ $data->updated_karu }} <br> {{ $data->keterangan_karu }}</i></p>
                                @else
                                Error
                                @endif
                                @else
                                <i><b> Tidak mempunyai karu</b></i>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12" @if($data->persetujuan_kabag==2) style="background-color: rgb(89, 255, 89);" @elseif($data->persetujuan_kabag==3) style="background-color: rgb(89, 255, 89);" @endif>


                            <div class="card-body">
                                <b>KABAG/KABID</b> <br>

                                @if($user->pegawai_kabag_id!=null)
                                {{ App\Models\User::find($user->pegawai_kabag_id)->name }} <br>

                                @if($data->persetujuan_kabag==1)
                                <span class="badge badge-pill badge-primary"><b><i>Diajukan</i></b></span>
                                @elseif($data->persetujuan_kabag==2)
                                <span class="badge badge-pill badge-success"><b><i>Menyetujui</i></b> </span>
                                <p><i>{{ $data->updated_kabag }} <br> {{ $data->keterangan_kabag }}</i></p>

                                @elseif($data->persetujuan_kabag==3)
                                <span class="badge badge-pill badge-danger"><b><i>Tidak Menyetujui</i></b></span>

                                <p><i>{{ $data->updated_kabag }} <br> {{ $data->keterangan_kabag }}</i></p>
                                @else
                                Error
                                @endif
                                @else
                                <i style="color:green"><b> Tidak mempunyai kabag/kabid</b></i>
                                @endif


                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12" @if($data->persetujuan_sdm==2) style="background-color: rgb(89, 255, 89);" @elseif($data->persetujuan_sdm==3) style="background-color: rgb(89, 255, 89);" @endif>

                            <div class="card-body">



                                <b>SDM</b> <br>
                                RAHMAWATI HARTINAH, SM

                                @if($data->persetujuan_sdm==1)
                                <span class="badge badge-pill badge-primary"><b><i>Diajukan</i></b></span>
                                @elseif($data->persetujuan_sdm==2)
                                <span class="badge badge-pill badge-success"><b><i>Menyetujui</i></b> </span>
                                <p><i>{{ $data->updated_sdm }} <br> {{ $data->keterangan_sdm }}</i></p>


                                @elseif($data->persetujuan_sdm==3)
                                <span class="badge badge-pill badge-danger"><b><i>Tidak Menyetujui</i></b></span>
                                <p><i>{{ $data->updated_sdm }} <br> {{ $data->keterangan_sdm }}</i></p>
                                @else
                                Error
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12" @if($data->persetujuan_dir==2) style="background-color: rgb(89, 255, 89);" @elseif($data->persetujuan_dir==3) style="background-color: rgb(89, 255, 89);" @endif>

                            <div class="card-body">



                                <b>Direksi</b> <br>
                                @if($user->pegawai_direksi_id!=null)
                                {{ App\Models\User::find($user->pegawai_direksi_id)->name }} <br>

                                @if($data->persetujuan_dir==1)
                                <span class="badge badge-pill badge-primary"><b><i>Diajukan</i></b></span>
                                @elseif($data->persetujuan_dir==2)
                                <span class="badge badge-pill badge-success"><b><i>Menyetujui</i></b> </span>
                                <p><i>{{ $data->updated_dir }} <br> {{ $data->keterangan_dir }}</i></p>
                                @elseif($data->persetujuan_dir==3)
                                <span class="badge badge-pill badge-danger"><b><i>Tidak Menyetujui</i></b></span>
                                <p><i>{{ $data->updated_dir }} <br> {{ $data->keterangan_dir }}</i></p>
                                @else
                                Error
                                @endif
                                @else
                                <i style="color:green"><b> Tidak mempunyai direksi</b></i>
                                @endif

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-7 col-sm-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Cuti Pegawai @if($dataperubahan!=null) <span class="badge badge-pill badge-warning float-right">Perubahan Tanggal</span>@endif</h4>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <td width="35%">Kode Cuti</td>
                            <td width="3%">:</td>
                            <td>SISCD-{{ $data->id }}</td>
                        </tr>

                        <tr>
                            <td width="35%">Jenis Cuti</td>
                            <td width="3%">:</td>
                            <td>{{ $data->jenis }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Alasan Cuti</td>
                            <td width="3%">:</td>


                            <td>
                                {{ $data->alasan }}
                            </td>

                        </tr>

                        <tr>
                            <td width="35%">Pegawai Peganti</td>
                            <td width="3%">:</td>
                            <td>{{ $data->nama_pegawai_peganti }}</td>
                        </tr>

                        <tr>
                            <td width="20%">Status</td>
                            <td width="3%">:</td>
                            <td>
                                @if($data->status==1)
                                <span class="badge badge-pill badge-primary"><b><i>Diajukan</i></b></span>
                                @elseif($data->status==2)
                                <span class="badge badge-pill badge-success"><b><i>Disetujui</i></b> </span>
                                <p style="font-size: 12px"><i>{{ $data->updated_at }} <br> {{ $data->keterangan }}</i></p>
                                @elseif($data->status==3)
                                <span class="badge badge-pill badge-danger"><b><i>Tidak Disetujui</i></b></span>
                                <p style="font-size: 12px"><i>{{ $data->updated_at }} <br> {{ $data->keterangan }}</i></p>

                                @elseif($data->status==4)
                                <span class="badge badge-pill badge-info"><b><i>Dibatalkan</i></b></span>
                                <p style="font-size: 12px"><i>{{ $data->updated_at }} <br> {{ $data->keterangan }}</i></p>
                                @else
                                Error
                                @endif
                            </td>
                        </tr>

                    </table>

                </div>
            </div>


        </div> <!-- end col -->
        <div class="col-lg-5 col-sm-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Informasi Pegawai</h4>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td width="35%">Nama</td>
                                    <td width="3%">:</td>
                                    <td>{{ $data->nama_pegawai }}</td>


                                </tr>
                                <tr>
                                    <td width="35%">NIK</td>
                                    <td width="3%">:</td>
                                    <td>{{ $pegawai->nik }}</td>


                                </tr>
                                <tr>
                                    <td width="35%">Telpon</td>
                                    <td width="3%">:</td>
                                    <td>{{ $pegawai->nohp }}</td>
                                </tr>
                                <tr>
                                    <td width="35%">Sisa Cuti</td>
                                    <td width="3%">:</td>
                                    <td>{{ $cutisisa }} hari</td>

                                </tr>



                                <tr>
                                    <td width="35%">Unit</td>
                                    <td width="3%">:</td>
                                    <td>{{ $unit }}</td>
                                </tr>


                            </table>
                        </div>
                    </div>



                </div>
            </div>

            @if($data->ufile!=null)
            <div class="card m-b-20">
                <div class="card-body">
                    @if($data->jenis=='Izin Sakit')
                    <h4 class="mt-0 header-title">Surat Keterangan Sakit &nbsp; <a href="{{ asset('/storage/surat_keterangan_sakit/'.$user->username.'/'.$data->ufile) }}" target="_blank" class="tabledit-edit-button btn btn-sm btn-info">
                            <span class="ti-import"></span>
                        </a>
                    </h4>
                    @elseif($data->jenis=='Cuti Melahirkan')
                    <h4 class="mt-0 header-title">Surat Keterangan Cuti Hamil &nbsp; <a href="{{ asset('/storage/surat_keterangan_melahirkan/'.$user->username.'/'.$data->ufile) }}" target="_blank" class="tabledit-edit-button btn btn-sm btn-info">
                            <span class="ti-import"></span>
                        </a>
                    </h4>
                    @elseif($data->jenis=='Izin Lainnya')
                    <h4 class="mt-0 header-title">Surat Keterangan Izin Lainnya &nbsp; <a href="{{ asset('/storage/izin_lainnya/'.$user->username.'/'.$data->ufile) }}" target="_blank" class="tabledit-edit-button btn btn-sm btn-info">
                            <span class="ti-import"></span>
                        </a>
                    </h4>


                    @endif
                </div>
            </div>
            @endif
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop

@section('javascript')
<script>
    $('#datatable2').DataTable({
        "scrollY": "400px"
        , "scrollCollapse": true
        , "paging": false
    });
    $('#datatable1').DataTable();

</script>
@stop

