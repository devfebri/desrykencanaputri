@extends('layouts.master')
@section('css')
<link href="{{ asset('template/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Kelas {{ $data->nama_kelas }}
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmahasiswa">
                            Tambah Mahasiswa
                        </button>
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmateri">
                            Tambah Materi
                        </button>

                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Materi </h4>
                        <table id="datatable1" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Materi</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materi as $key => $row)
                                <tr>
                                    <td>{{ $row->nama_materi }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td>{{ $row->file }}</td>
                                    <td>{{ $row->link }}</td>
                                    <td>
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: center;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="#" style="margin: 5px;" class="tabledit-edit-button btn btn-sm btn-primary"><span class="ti-shift-right"></span></a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card m-b-30">

                    <div class="card-body">
                        <h4 class="mt-0 header-title">Mahasiswa</h4>
                        <table id="datatable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal materi-->
<div class="modal fade" id="tambahmateri-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Materi</h6>
                        <input type="text" class="form-control" name="nama_materi" id="nama_materi" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Deskripsi</h6>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" maxlength="225" rows="3" ></textarea>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">File</h6>
                        <input type="file" class="form-control" name="file_materi" id="file_materi" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Link Materi</h6>
                        <textarea id="link_materi" name="link_materi" class="form-control" maxlength="225" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal mahasiswa-->
<div class="modal fade" id="tambahmahasiswa-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
                <div class="modal-body">
                    <table id="datatable3" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jenis Kelamin</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $key=>$row3)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row3->name }}</td>
                                    <td>{{ $row3->jk }}</td>
                                    <td>{{ $row3->no_hp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
@section('javascript')
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
    $('#datatable1').DataTable();
    $('#datatable2').DataTable();
    // $('#datatable3').DataTable();
    $(document).ready(function(){
         $('#tombol-tambahmateri').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Materi"); //valuenya tambah pegawai baru
            $('#tambahmateri-edit-modal').modal('show');
        });
         $('#tombol-tambahmahasiswa').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Mahasiswa"); //valuenya tambah pegawai baru
            $('#tambahmahasiswa-edit-modal').modal('show');

        });
    });
</script>

@stop

