@extends('layouts.dashboard_template')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title ?? "Page Title" }}
        <small>{{ $page_description ?? '' }} {{ $sebutan_wilayah }} {{ $nama_wilayah }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profil')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{$page_title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    @include('partials.flash_message')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="float-right">
                        <div class="btn-group">
                            <a href="{{ route('data.laporan-apbdes.import') }}">
                                <button type="button" class="btn btn-warning btn-sm" title="Import Data"><i class="fa fa-upload"></i> Import</button>
                            </a>
                        </div>
                    </div> 
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Desa</label>
                                <select class="form-control" id="list_desa">
                                    <option value="ALL">ALL</option>
                                    @foreach($list_desa as $desa)
                                        <option value="{{$desa->desa_id}}">{{$desa->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="apbdes-table">
                                    <thead>
                                        <tr>
                                            <th width="100px">Aksi</th>
                                            <th>Desa</th>
                                            <th>Nama</th>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Tgl. Lapor</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
@include('partials.asset_select2')
@include('partials.asset_datatables')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#list_desa').select2();
        var data = $('#apbdes-table').DataTable({
            autoWidth: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{!! route( 'data.laporan-apbdes.getdata' ) !!}",
                data: function (d) {
                    d.desa = $('#list_desa').val();
                }
            },
            columns: [
                {data: 'action', name: 'action', class: 'text-center', "searchable": false, "orderable":false},
                {data: 'nama_desa', name: 'nama_desa'},
                {data: 'judul', name: 'judul'},
                {data: 'tahun', name: 'tahun'},
                {data: 'semester', name: 'semester'},
                {data: 'imported_at', name: 'imported_at'},
                
            ],
            order: [[0, 'nama_desa']]
        });
        $('#list_desa').on('select2:select', function (e) {
            data.ajax.reload();
        });
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush