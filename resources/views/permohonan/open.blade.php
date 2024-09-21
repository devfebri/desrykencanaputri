@extends('layouts.master')

@section('content')

{{-- @dd($data); --}}
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

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="row text-center" style="font-size: 12px;">
                        <div class="col-lg-4 col-md-6 col-sm-12" @if( $data->persetujuan_kasi=='Disetujui') style="background-color: #83ff33 ;"  @elseif($data->persetujuan_kasi=='Tidak Disetujui') style="background-color: #ff5733;" @endif>
                            <div class="card-body">
                                <b>Kasi</b> <br>
                                <span class="badge badge-pill badge-primary"><b><i>{{ $data->persetujuan_kasi }}</i></b></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12" @if( $data->persetujuan_kabid=='Disetujui') style="background-color: #83ff33 ;" @elseif($data->persetujuan_kabid=='Tidak Disetujui') style="background-color: #ff5733;" @endif>

                            <div class="card-body">
                                <b>Kabid</b> <br>
                                <span class="badge badge-pill badge-primary"><b><i>{{ $data->persetujuan_kabid }}</i></b></span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12" @if( $data->persetujuan_kadis=='Disetujui') style="background-color: #83ff33 ;" @elseif($data->persetujuan_kadis=='Tidak Disetujui') style="background-color: #ff5733;" @endif>

                            <div class="card-body">
                                <b>Kadis</b> <br>
                                <span class="badge badge-pill badge-primary"><b><i>{{ $data->persetujuan_kadis }}</i></b></span>

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Permohonan </h4>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <td width="35%">Nama Pemohon</td>
                            <td width="3%">:</td>
                            <td>{{ $data->nama }}</td>
                        </tr>

                        <tr>
                            <td width="35%">Pekerjaan</td>
                            <td width="3%">:</td>
                            <td>{{ $data->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td width="35%">No HP</td>
                            <td width="3%">:</td>
                            <td>
                               {{ $data->nohp }}
                            </td>
                        </tr>

                        <tr>
                            <td width="35%">Alamat</td>
                            <td width="3%">:</td>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Jenis</td>
                            <td width="3%">:</td>
                            <td>{{ $data->jenis }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Keterangan</td>
                            <td width="3%">:</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>

                        <tr>
                            <td width="20%">Status</td>
                            <td width="3%">:</td>
                            <td>
                                <span class="badge badge-pill badge-primary"><b><i>{{ $data->status }}</i></b></span>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>


        </div> <!-- end col -->
        <div class="col-lg-6 col-sm-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Dokumen</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                @foreach ($dokumen as $key=>$row2)
                                    <a href="{{ asset('/storage/dokumen/'.$row2->permohonan_id.'/'.$row2->dokumen) }}" target="_blank" class="btn btn-primary btn-sm">Dokumen {{ ++$key }}</a>
                                @endforeach
                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Foto Lokasi</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                @foreach ($foto_lokasi as $key1=>$row1)
                                <a href="{{ asset('/storage/foto_lokasi/'.$row1->permohonan_id.'/'.$row1->foto) }}" class="btn btn-primary btn-sm" target="_blank">Foto Lokasi {{ ++$key1 }}</a>

                                @endforeach
                            </div>

                        </div>
                    </div>



                </div>
            </div>


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

