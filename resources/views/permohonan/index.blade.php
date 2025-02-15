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
                    <h4 class="page-title">Permintaan
                        {{-- <button type="button" class="btn btn-primary mb-2  float-right btn-sm" id="tombol-tambah">
                            Tambah Data
                        </button> --}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable1" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemohon</th>
                                    <th>Jenis Permintaan</th>
                                    <th>Status</th>
                                    {{-- <th>Tanggal Update</th> --}}
                                    <th>Tanggal Pengambilan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jenis }}</td>
                                    <td style="text-align: center">
                                        @if($row->status=='Proses')
                                        <span class="badge badge-pill badge-info">{{ $row->status }}</span>
                                        @elseif($row->status=='Tidak Disetujui')
                                        <span class="badge badge-pill badge-warning">{{ $row->status }}</span>
                                        @elseif($row->status=='Disetujui')
                                        <span class="badge badge-pill badge-success">{{ $row->status }}</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $row->updated_at }}</td> --}}
                                    <td> @if($row->tanggal_pengambilan != null)

                                        {{ date('d-m-Y', strtotime($row->tanggal_pengambilan)); }}
                                        @endif</td>

                                    <td>
                                        <a href="{{ route(auth()->user()->role.'_permohonandetail',$row->id) }}" style="margin: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail" class="tabledit-edit-button btn btn-sm btn-primary"><span class="ti-receipt"></span></a>
                                        @if($row->status == 'Proses')
                                        <button style="margin: 5px;" id="btnsetuju" data-id="{{ $row->id }}" data-original-title="Setujui" class="tabledit-edit-button btn btn-sm btn-success edit"><span class="ti-check"></span></button>
                                        
                                        

                                        <a href="{{ route(auth()->user()->role.'_permohonan_tidak_disetujui',$row->id) }}" style="margin: 5px;" onclick="return confirm('Apakah anda yakin ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tidak disetujui" class="tabledit-edit-button btn btn-sm btn-danger"><span class="ti-close"></span></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="setujuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tanggal Pengambilan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin_permohonan_disetujui') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="date" class="form-control" name="tanggal_pengambilan" id="tanggal_pengambilan" required>
                    <input type="hidden" class="form-control" name="dataid" id="dataid" value="" >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>

        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h6 class="text-muted fw-400 mt-3">Name</h6>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">No HP</h6>
                        <input type="number" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Email</h6>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Role</h6>
                        <select class=" form-control mb-3 custom-select" name="role" id="role" style="width: 100%; height:36px;" required>
                            <option value="">-pilih-</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                        </select>
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

@stop
@section('javascript')
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.edit', function () {

            var data_id = $(this).data('id');  
            $('#setujuModal').modal('show');
            $('#dataid').val(data_id);

            // alert(data_id);
           
        });
    $(document).ready(function() {
        var table = $('#datatable1').DataTable();
        
    });

</script>

@stop

